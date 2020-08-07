<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Teacher;
use App\Course;
use DB;
use PDF;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id = 0)
    {
        $sid = decrypt($id);
        $data['teacher'] = Teacher::where('id', $sid)->get();
        $data['course'] = Course::where('id', $data['teacher'][0]->id)->get();
        //dd($data['course']);
        // set certificate file
        $certificate = 'file://' . base_path() . '/public/certificate/tcpdf.crt';

        // set additional information in the signature
        $info = array(
            'Name' => 'TCPDF',
            'Location' => 'Office',
            'Reason' => 'Testing TCPDF',
            'ContactInfo' => 'http://www.tcpdf.org',
        );
        if (strlen($data['teacher'][0]->name) <= 16) {
            $fs = '75px';
            $y = 115;
        } else if (strlen($data['teacher'][0]->name) > 16 && strlen($data['teacher'][0]->name) <= 22) {
            $fs = '64px';
            $y = 118;
        } else {
            $fs = '48px';
            $y = 123;
        }

        $html0 = '<div style="font-size:' . $fs . ';font-family: EdwardianScriptITC;"><b>' . $data['teacher'][0]->name . '</b></div>';
        $html1 =  $data['course'][0]->description;
        $html4 =   '<div style="font-size:5px;">Scan To Verify</div>';
        $html5 =   '<div style="font-size:18px;text-align:center;">' . $data['teacher'][0]->dateofcertification . '</div>';
        $html6 =   '<div style="font-size:15px;text-align:center;"><b>Date</b></div>';
        $html7 =   '<div style="font-size:15px;text-align:center;"><b>' . $data['course'][0]->aname . '</b></div>';
        $html8 =   '<div style="font-size:10px;text-align:center;">(' . $data['course'][0]->arole . ')</div>';
        PDF::SetProtection(array('copy', 'modify'), $data['teacher'][0]->serialkey, "ourcodeworld-master", 0, null);

        // set document signature
        PDF::setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);

        PDF::SetFont('helvetica', '', 12);
        PDF::SetTitle($data['teacher'][0]->name . ' Certificate');
        PDF::AddPage();
        // set style for barcode

        // add image for signature
        // get the current page break margin
        $bMargin = PDF::getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = PDF::getAutoPageBreak();
        // disable auto-page-break
        PDF::SetAutoPageBreak(false, 0);
        PDF::Image('image/certificate.png', 0, 0, 210, 298, '', '', '', false, 300, '', false, false, 0);
        PDF::SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        PDF::setPageMark();
        // add view content
        PDF::writeHTMLCell(180, 0, 16, 155, $html1, 0, 0, 0, true, 'C', true);
        PDF::writeHTMLCell(190, 0, 10, $y, $html0, 0, 0, 0, true, 'C', true);
        PDF::writeHTMLCell(20, 0, 97, 228, $html4, 0, 0, 0, true, 'C', true);
        PDF::writeHTMLCell(50, 0, 35, 205, $html5, 0, 0, 0, true, 'C', true);
        PDF::writeHTMLCell(50, 0, 35, 213, $html6, 0, 0, 0, true, 'C', true);
        PDF::writeHTMLCell(80, 0, 120, 213, $html7, 0, 0, 0, true, 'C', true);
        PDF::writeHTMLCell(80, 0, 120, 220, $html8, 0, 0, 0, true, 'C', true);
        PDF::Image($data['course'][0]->asignature, 140, 200, 35, 15, 'PNG');
        // define active area for signature appearance
        PDF::setSignatureAppearance(140, 200, 35, 15);
        $style = array(
            'border' => 0,
            'vpadding' => 0,
            'hpadding' => 0,
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1, // height of a single module in points
        );

        // QRCODE,L : QR-CODE Low error correction
        PDF::write2DBarcode(route('createPDF', ['id' => $id]), 'QRCODE,L', 94, 230, 25, 25, $style, 'N');
        // save pdf PDF

        PDF::Output($data['teacher'][0]->name . ' Certificate.pdf');
    }
    public function teacher()
    {
        $data['teacher'] = Teacher::all();
        $data['course'] = Course::all();
        return view('teacher')->with($data);
    }
    public function saveteacher(TeacherRequest $request)
    {
        $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';


        $teacher = new Teacher();
        $teacher->name = $request->teachername;
        $teacher->dateofcertification = $request->teacherdoc;
        $teacher->courseid = $request->selectcourse;
        $teacher->serialkey = substr(str_shuffle($permitted_chars), 0, 6);

        $teacher->save();

        return back();
    }
}
