<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\support\Facades\Auth;

class contactComplains extends Controller
{
    public function index () 
    {
        return view('frontend.ContactUS');
    }

    public function submitForm (Request $request) 
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        if($name != "" && $email != "" && $subject != "" && $message != "")
        {

            if(Auth::check())
            {
                $user  = Auth::user();
                if($user->hasVerifiedEmail())
                {
                    $contact = new Contact();
                    $contact->name = $name;
                    $contact->email = $email;
                    $contact->subject = $subject;
                    $contact->message =$message;
                    $contact->save();
                    return response()->json(['status' => "Message Sended Successfully"]);
                }
                else
                {
                    return response()->json(['status' => "Please Verify you Email"]);
                }
            }
            else
            {
                return response()->json(['status' => "Please Login First..."]);
            }
        }
        else
        {
            return response()->json(['status' => "Kindly Fill Form Correctly"]);
        }
    }


    public function viewcomplains ()
    {
        $complain =  Contact::all();
        return view('Admin.complains.index', compact('complain'));
    }
}
