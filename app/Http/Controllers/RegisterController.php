<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Chrizo;

class RegisterController extends Controller
{
   public function ShowRegister(){
     return view ('registerform');
   }

   public function RegisterStore(Request $request){
   $user =$request->validate([
        'name'=> 'Required|string|max:250',
        'email'=> 'Required|email|unique:abayuza',
        'password'=> 'Required|min:6',
    ]);
    Chrizo::create($user);
    return redirect()->back()->with('success', 'User Created');
}
}