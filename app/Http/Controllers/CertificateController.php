<?php

namespace App\Http\Controllers;

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
        $data['teacher'] = DB::table('teachers')->where('id', $id)->get();
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
        $html2 =  '<div style="font-size:15px;">Here some extra information about completing the course and such... you could populate this with some more variable information, maybe customize it based on how well the learner did, etc.
    </div>';
        PDF::SetProtection(array('print', 'copy', 'modify'), $data['teacher'][0]->dob, "ourcodeworld-master", 0, null);

        // set document signature
        PDF::setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);

        PDF::SetFont('helvetica', '', 12);
        PDF::SetTitle('Hello World');
        PDF::AddPage('l');

        // print a line of text
        $text = view('tcpdf');



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
        PDF::Image('image/signature.png', 117, 165, 35, 15, 'PNG');
        // define active area for signature appearance
        PDF::setSignatureAppearance(117, 165, 35, 15);

        // save pdf PDF

        PDF::Output('hello_world.pdf');
    }
    public function teacher()
    {
        $data['teacher'] = DB::table('teachers')->get();
        return view('teacher')->with($data);
    }
    public function saveteacher(Request $request)
    {
        $data = $request->all();
        //dd($data);

        $arr = array(
            'name' => $data['teachername'],
            'dob' => $data['teacherdob']
        );
        DB::table('teachers')->insert($arr);
        return redirect()->route('teacher');
    }
}
