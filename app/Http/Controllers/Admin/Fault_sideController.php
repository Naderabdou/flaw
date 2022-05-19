<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fault_side;
use Illuminate\Http\Request;

class Fault_sideController extends Controller
{
    public function index(){
        $fault=Fault_side::all();
        return view('dashboard.Fault_side.index',compact('fault'));
    }
    public function store(Request $request){
     $data=   $request->validate([
            'name'=>'string|required'
        ]);
        Fault_side::create($data);
        return redirect()->back();
    }
    public function show($id){
        Fault_side::destroy($id);
        return redirect()->back();
    }

}
