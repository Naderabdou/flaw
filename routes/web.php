<?php

use App\Events\RealTimeMessage;
use App\Models\splash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function (){
    $splash=splash::first();
   return view('welcome',compact('splash'));
});

Route::get('sms','FirebaseController@index');

require __DIR__.'/auth.php';
