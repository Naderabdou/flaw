<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Causes_glitch;
use Illuminate\Http\Request;

class Causes_glitchController extends Controller
{
    public function index(){
        $cause=Causes_glitch::all();
        return view('dashboard.causes_glitch.index',compact('cause'));
    }
    public function store(Request $request){
     $data=   $request->validate([
           'causes'=>'string|required'
        ]);
     Causes_glitch::create($data);
     return  redirect()->back();
    }
    public function show($id){
        Causes_glitch::destroy($id);
        return redirect()->back();
}
}
