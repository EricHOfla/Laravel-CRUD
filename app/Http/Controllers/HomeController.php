<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('homepage');
    }
    public function Showabout(){
        return  view('Home.about');
    }
    public function ShowImageForm(){
        return view('imageform');
    }

    public function ImageUpload(Request $request){
         $request->validate([
            'product' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);
         $imageName=time() . '.' . $request->image->extension();
         $request->image->move(public_path('photo'), $imageName);

         Product::create([
            'product' =>$request->product,
            'price' => $request ->price,
            'image' => $imageName
         ]);
         return back()->with('success', "Image Uploaded Successfully.");
    }

    public function RetriveImage(){
        $data= Product::all();
        return view('allimage', compact('data'));
    }
}
