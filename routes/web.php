<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;

Route::get('/',[HomeController::class, 'home'])->name('homepage');
Route::get('/about', [HomeController::class, 'ShowAbout'])->name('aboutpage');
Route::get('/contactus', [ContactController::class, 'ShowContact'])->name('contactus');
Route::get('/servicepath',[ContactController::class, 'ShowService'])->name('service');


Route::get('/form', [RegisterController::class,
 'ShowRegister'])->name('register');
Route::post('/formsubmit', [RegisterController::class,
 'RegisterStore'])->name('submit');



 Route::post('/',[ContactController::class,
  'ContactStore'])->name('contact.save');

  Route::get('/image', [HomeController::class,  'ShowImageForm'])->name('image.show');
  Route::post('/image', [HomeController::class, 'ImageUpload'])->name('image.store');
 
  Route::get('/image/data', [HomeController::class, 'RetriveImage'])->name('retrive.image');