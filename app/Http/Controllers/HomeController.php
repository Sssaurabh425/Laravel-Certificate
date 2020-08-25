<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;
use App\Country;
use App\State;
use App\City;
use Session;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['state'] = State::where('country_id',101)->get();
        //dd($data);
        return view('welcome')->with($data);
    }
    public function faq()
    {
        return view('faq');
    }
    public function termsandconditions()
    {
        return view('termandcondition');
    }
    public function privacypolicies()
    {
        return view('privacypolicy');
    }
    public function savecontact(ContactRequest $request)
    {

        $contact = new Contact();
        $contact->name = $request->contactname;
        $contact->email = $request->contactemail;
        $contact->mobileno = $request->mobileno;
        $contact->entity = $request->entityvalue;
        $contact->institutionname = $request->institutionname;
        $contact->city = $request->city;
        $contact->state = $request->state;
        $contact->save();
        $details = [
            'name' => $request->contactname,
            'title' => 'Mail from E-edport.com',
            'body' => 'Thank You For Contacting Us, Our Team Member will Contact You Shortly'
        ];
        Mail::to($request->contactemail)->send(new \App\Mail\ContactEmail($details));
        Session::flash('flash_message', 'Thank You! Our Team Will Reach Out Soon');
        Session::flash('flash_type', 'success');
        return back();
    }
    public function getcity(Request $request)
    {

        $city = City::where('state_id', trim($request->state_id))->get();
       
        //dd($contact);
        echo json_encode($city);
        exit;
    }
}
