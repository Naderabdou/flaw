<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\Replies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function store(Request $request){

        if (Auth::check()) {
            Replies::create([
                'comment_id' => $request->input('comment_id'),
                'name' => $request->input('name'),
                'reply' => $request->input('reply'),
                'user_id' => Auth::user()->id
            ]);

            return redirect()->route('view')->with('success','Reply added');
        }

        return back()->withInput()->with('error','Something wronmg');

    }
    public function delete(Request $request,$id)
    {

        Replies::destroy($id);
        return redirect()->back();


    }
    public function replay(Request $request){
        if (Auth::check()) {
            Replies::create([
                'comment_id' => $request->input('comment_id'),
                'name' => $request->input('name'),
                'reply' => $request->input('reply'),
                'user_id' => Auth::user()->id
            ]);

            return redirect()->back()->with('success','Reply added');
        }

        return back()->withInput()->with('error','Something wronmg');
    }
public function show(Request $request,$id){
       $update= Replies::findorFail($id);
        $update->reply=$request->reply;
        $update->save();
        return redirect()->back();
    }

}
