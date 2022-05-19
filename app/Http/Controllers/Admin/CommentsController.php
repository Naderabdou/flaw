<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\Imbalance;
use App\Notifications\AddComment;
use App\Notifications\ImbalancesNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CommentsController extends Controller
{
    public function store(Request $request){

           //  $id=$request->imbalance_id;
        if (Auth::check()) {
            Comment::create([
                'name' => Auth::user()->name,
                'body' => $request->input('body'),
                'user_id' => $request->user_id,
                'imbalance_id'=>$request->imbalance_id,
            ]);



            return redirect()->back()->with('success','Comment Added successfully..!');
        }else{
            return back()->withInput()->with('error','Something wrong');
        }
    }
    public function show($id){
        comment::destroy($id);
        return redirect()->back();
    }
    public function update(Request $request,$id){
       $updatecomment= comment::findorFail($id);
       $updatecomment->body=$request->body;
       $updatecomment->save();
       return redirect()->back();
    }

}
