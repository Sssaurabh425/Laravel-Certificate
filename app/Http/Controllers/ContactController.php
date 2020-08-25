<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\SendmailRequest;
use Illuminate\Support\Facades\Mail;
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
    public function entitymail(Request $request)
    {
        $contact = new Contact;
        if (!empty($request->entity)) {
            $contact = $contact->where('entity', trim($request->entity));
        }
        if (!empty($request->institutionname)) {
            $contact = $contact->where('institutionname', trim($request->institutionname));
        }
        if (!empty($request->status)) {
            $contact = $contact->where('status', trim($request->status));
        }

        //dd($contact);
        echo json_encode($contact->get());
        exit;
    }
    public function sendmail(SendmailRequest $request)
    {
        $image = $request->file('attachment');

        $details = [
            'attachment'=>$image,
            'subject' => $request->subject,
            'message' => $request->message
        ];
        //dd($details);
        foreach ($request->mailto as $recipient) {
        Mail::to($recipient)->send(new \App\Mail\CertificateMail($details));
        }
        Session::flash('flash_message', 'Thank You! Our Team Will Reach Out Soon');
        Session::flash('flash_type', 'success');
        return back();
    }
}
