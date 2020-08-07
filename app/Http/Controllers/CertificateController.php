<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Teacher;
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
        //$data['teacher'] = DB::table('teachers')->where('id', $id)->get();
        $data['teacher'] = Teacher::findorFail($id)->get();
        // set certificate file
        $certificate = 'file://' . base_path() . '/public/certificate/tcpdf.crt';

        // set additional information in the signature
        $info = array(
            'Name' => 'TCPDF',
            'Location' => 'Office',
            'Reason' => 'Testing TCPDF',
            'ContactInfo' => 'http://www.tcpdf.org',
        );
        $html1 = '<div style="color: #FFF;font-size: 18px;"><b>For being generally awesome and kicking ass</b></div>';
        $html3 = '<div style="font-size:35px;font-family: Courier, serif;">' . $data['teacher'][0]->name . '</div>';
        $html2 =  '<div style="font-size:15px;">Here some extra information about completing the course name <b>' . $data['teacher'][0]->coursename . '</b> and such... you could populate this with some more variable information, maybe customize it based on how well the learner did, etc.</div>';
        $html4 =   '<div style="font-size:7px;">Scan To Verify</div>';
        $html5 =   '<div style="font-size:15px;text-align:center;">' . $data['teacher'][0]->dateofcertification . '</div>';
        PDF::SetProtection(array('copy', 'modify'), $data['teacher'][0]->serialkey, "ourcodeworld-master", 0, null);

        // set document signature
        PDF::setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);

        PDF::SetFont('helvetica', '', 12);
        PDF::SetTitle('Hello World');
        PDF::AddPage('l');
        // set style for barcode

        // add image for signature
        // get the current page break margin
        $bMargin = PDF::getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = PDF::getAutoPageBreak();
        // disable auto-page-break
        PDF::SetAutoPageBreak(false, 0);
        PDF::Image('image/CertificateBackground_Cropped.png', 0, 0, 300, 200, '', '', '', false, 300, '', false, false, 0);
        PDF::SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        PDF::setPageMark();
        // add view content
        PDF::writeHTMLCell(150, 0, 127, 67, $html1, 0, 0, 0, true, 'R', true);
        PDF::writeHTMLCell(150, 0, 43, 110, $html3, 0, 0, 0, true, 'L', true);
        PDF::writeHTMLCell(150, 0, 43, 125, $html2, 0, 0, 0, true, 'L', true);
        PDF::writeHTMLCell(30, 0, 262, 0, $html4, 0, 0, 0, true, 'C', true);
        PDF::writeHTMLCell(50, 0, 40, 173, $html5, 0, 0, 0, true, 'C', true);
        PDF::Image('image/signature.png', 117, 165, 35, 15, 'PNG');
        // define active area for signature appearance
        PDF::setSignatureAppearance(117, 165, 35, 15);
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
        PDF::write2DBarcode(route('createPDF', ['id' => $id]), 'QRCODE,L', 267, 5, 30, 30, $style, 'N');
        // save pdf PDF

        PDF::Output('hello_world.pdf');
    }
    public function teacher()
    {
        $data['teacher'] = Teacher::all();
        return view('teacher')->with($data);
    }
    public function saveteacher(TeacherRequest $request)
    {
        $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $new = substr(str_shuffle($permitted_chars), 0, 6);

        $teacher = new Teacher();
        $teacher->name = $request->teachername;
        $teacher->dateofcertification = $request->teacherdoc;
        $teacher->coursename = $request->selectcourse;
        $teacher->serialkey = $request->$new;

        $teacher->save();

        return back();
        // $data = $request->all();
        //dd($data);
        // $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $arr = array(
        //     'name' => $data['teachername'],
        //     'dateofcertification' => $data['teacherdoc'],
        //     'coursename' => $data['selectcourse'],
        //     'serialkey' => substr(str_shuffle($permitted_chars), 0, 6),
        // );
        // DB::table('teachers')->insert($arr);
        // return redirect()->route('teacher');
    }
}
