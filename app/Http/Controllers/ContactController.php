<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
   public function ShowContact(){
    return view('Home.contactus');
   }

   public function ShowService(){
    return view('service.servicepage');
   }

  public function ContactStore(Request $request){
   
  $contact = $request->validate([
      'name' => 'required|string|max:250',
      'email' => 'required|email',
      'subject' => 'required|string|max:100',
      'message' => 'required|string|min:10',
   ]);
    Contact::create($contact);

    return redirect()->back()->with('success', 'Message Send');
  }


}
