<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function index($id=0)
    {
		$data['teacher']=DB::table('tbl_teacher')->where('id',$id)->get();
        $html = '<div style="width:800px; height:1000px; padding:20px; text-align:center; border: 10px solid #787878">
<div style="width:750px; height:1000px; padding:20px; text-align:center; border: 5px solid #787878">
       <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
       <br><br>
       <span style="font-size:25px"><i>This is to certify that</i></span>
       <br><br>
       <span style="font-size:30px"><b>'.$data['teacher'][0]->name.'</b></span><br/><br/>
       <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
       <span style="font-size:25px"><i>dated</i></span><br>'.$data['teacher'][0]->dob.'
</div>
</div>';
        PDF::SetProtection(array('print', 'copy','modify'), $data['teacher'][0]->dob, "ourcodeworld-master", 0, null);
        PDF::SetTitle('Hello World');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output('hello_world.pdf');
    }
	public function teacher()
    {
	$data['teacher']=DB::table('tbl_teacher') -> get();
	return view('teacher')->with($data);
	}
	public function saveteacher(Request $request)
    {
	$data=$request->all();
	//dd($data);

		$arr = array
		(  'name' => $data['teachername'],
			'dob' => $data['teacherdob']
		);
		DB::table('tbl_teacher') -> insert($arr);
		return redirect()->route('teacher');
	}
}