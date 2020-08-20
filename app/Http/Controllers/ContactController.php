<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Session;

class ContactController extends Controller
{
    //
    public function contacts()
    {

        $data['contact'] = Contact::latest()->get();
        //dd($data['contact']);
        return view('contact')->with($data);
    }
    public function updatecontactstatus(Request $request)
    {
        $contact = Contact::find($request->contact_id);
        $contact->status = $request->contact_status;
        $contact->save();
        Session::flash('flash_message', 'Well done! You successfully Update the Contact Status');
        Session::flash('flash_type', 'success');
        return back();
    }
}
