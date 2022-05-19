<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SplashRequest;
use App\Http\Requests\SplashUpdate;
use App\Models\splash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SplashController extends Controller
{
   public function index(){


     $splashs=  splash::get();


       return view('dashboard.splash.index',compact('splashs'));
   }
   public function create(){
       return view ('splash.create');
   }
   public function store(SplashRequest $request){
       $data=$request->validated();
       if ($data['icon'] != ''){
           $path=Storage::disk('public')->putFile('/splash',$request->icon);
           $data['icon']=$path;
       }
       splash::create($data);
       return redirect()->route('splash.index');


   }
   public function update(SplashUpdate $request,$id): \Illuminate\Http\RedirectResponse
   {
       $splashUpdate= splash::findorFail($id);
       $data=$request->validated();

       if ($data['icon'] != ''){
           $path=Storage::disk('public')->putFile('/splash',$request->icon);
           $data['icon']=$path;}

       $splashUpdate->update($data);
       return redirect()->back();
   }
   public function show($id){
       splash::destroy($id);
       return redirect()->back();

   }



}
