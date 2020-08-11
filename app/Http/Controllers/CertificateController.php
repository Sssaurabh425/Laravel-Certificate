<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Http\Requests\CourseRequest;
use App\Certificate;
use App\Course;
use PDF;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id = 0)
    {
        $sid = decrypt($id);
        $data['certificate'] = Certificate::where('id', $sid)->get();
        $data['course'] = Course::where('id', $data['certificate'][0]->courseid)->get();
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
        if (strlen($data['certificate'][0]->name) <= 16) {
            $fs = '75px';
            $y = 115;
        } else if (strlen($data['certificate'][0]->name) > 16 && strlen($data['certificate'][0]->name) <= 22) {
            $fs = '64px';
            $y = 118;
        } else {
            $fs = '48px';
            $y = 123;
        }

        $html0 = '<div style="font-size:' . $fs . ';font-family: EdwardianScriptITC;"><b>' . $data['certificate'][0]->name . '</b></div>';
        $html1 =  $data['course'][0]->description;
        $html4 =   '<div style="font-size:5px;">Scan To Verify</div>';
        $html5 =   '<div style="font-size:18px;text-align:center;">' . $data['certificate'][0]->dateofcertification . '</div>';
        $html6 =   '<div style="font-size:15px;text-align:center;"><b>Date</b></div>';
        $html7 =   '<div style="font-size:15px;text-align:center;"><b>' . $data['course'][0]->aname . '</b></div>';
        $html8 =   '<div style="font-size:10px;text-align:center;">(' . $data['course'][0]->arole . ')</div>';
        PDF::SetProtection(array('copy', 'modify'), $data['certificate'][0]->serialkey, "ourcodeworld-master", 0, null);

        // set document signature
        PDF::setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);

        PDF::SetFont('helvetica', '', 12);
        PDF::SetTitle($data['certificate'][0]->name . ' Certificate');
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
            'border' => 1,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1, // height of a single module in points
        );

        // QRCODE,L : QR-CODE Low error correction
        PDF::write2DBarcode(route('createPDF', ['id' => $id]), 'QRCODE,L', 95, 230, 24, 24, $style, 'N');
        // save pdf PDF

        PDF::Output($data['certificate'][0]->name . ' Certificate.pdf');
    }
    public function certificates()
    {
        $data['certificate'] = Certificate::all();
        $data['course'] = Course::all();
        return view('certificate')->with($data);
    }
    public function course()
    {
        $data['course'] = Course::all();
        return view('course')->with($data);
    }
    public function savecertificate(CertificateRequest $request)
    {
        $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $rdstring = substr(str_shuffle($permitted_chars), 0, 6);

        $certificate = new Certificate();
        $certificate->name = $request->teachername;
        $certificate->email = $request->teacheremail;
        $certificate->dateofcertification = $request->teacherdoc;
        $certificate->courseid = $request->selectcourse;
        $certificate->serialkey = $rdstring;

        $certificate->save();
        $data['certificate'] = Certificate::where('serialkey', $rdstring)->get();
        //dd($data['certificate'][0]->id);
        $details = [
            'id' => $data['certificate'][0]->id,
            'password' => $rdstring,
            'name' => $request->teachername,
            'title' => 'Mail from E-edport.com',
            'body' => 'You have successfully completed your Course. Please find the Link and Password for the Certificate'
        ];
        Mail::to($request->teacheremail)->send(new \App\Mail\Sendemail($details));
        Session::flash('flash_message', 'Well done! You successfully Added the Teacher Certificate');
        Session::flash('flash_type', 'success');
        return back();
    }
    public function savecourse(CourseRequest $request)
    {
        $image = $request->asignature;
        $extension = $image->getClientOriginalExtension();
        $shtname = time() . rand(0, 9);
        $fileName = $shtname . '.' . $extension;
        if (trim($fileName) != "") {
            $destinationPath = 'image/signature'; // upload path
            $image->move($destinationPath, $fileName);
        }
        $course = new Course();
        $course->name = $request->coursename;
        $course->description = $request->coursedesc;
        $course->aname = $request->aname;
        $course->arole = $request->arole;
        $course->asignature = $destinationPath . "/" . $fileName;


        $course->save();

        Session::flash('flash_message', 'Well done! You successfully Added the Course');
        Session::flash('flash_type', 'success');
        return back();
    }
    public function updatecourse(Request $request)
    {
        $image = $request->easignature;
        $extension = $image->getClientOriginalExtension();
        $shtname = time() . rand(0, 9);
        $fileName = $shtname . '.' . $extension;
        if (trim($fileName) != "") {
            $destinationPath = 'image/signature'; // upload path
            $image->move($destinationPath, $fileName);
        }
        $course = Course::find($request->ecourseid);
        $course->name = $request->ecoursename;
        $course->description = $request->ecoursedesc;
        $course->aname = $request->eaname;
        $course->arole = $request->earole;
        $course->asignature = $destinationPath . "/" . $fileName;


        $course->save();

        Session::flash('flash_message', 'Well done! You successfully Update the Course');
        Session::flash('flash_type', 'success');
        return back();
    }
    public function getcourse(Request $request)
    {
        $course_id = $request->course_id;
        $results = Course::where('id', $course_id)->get();
        //dd($results);

        if ($results) {
            echo json_encode($results[0]);
            exit;
        } else {
            return false;
        }
    }
}
