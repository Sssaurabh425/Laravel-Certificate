<?php

namespace App\Http\Controllers;
use App\Http\Requests\TeacherRequest;
use App\Teacher;
use Session;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function saveteacher(TeacherRequest $request)
    {

        $teacher = new Teacher();
        $teacher->name = $request->teachername;
        $teacher->email = $request->teacheremail;
        $teacher->mobileno = $request->mobileno;
        $teacher->entity = $request->entityvalue;
        $teacher->institutionname = $request->institutionname;
        $teacher->certificationlevel = $request->selectlevel;
        $teacher->save();
        //dd($data['teacher'][0]->id);
        Session::flash('flash_message', 'Well done! You successfully Added the Teacher');
        Session::flash('flash_type', 'success');
        return back();
    }
    public function teachers()
    {

        $data['teacher'] = Teacher::all();
        return view('teacher')->with($data);
    }
    public function registerteacher()
    {
        return view('registerteacher');
    }
}
