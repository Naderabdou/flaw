<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\CommentBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentBlogController extends Controller
{
    public function store(Request $request){

        if (Auth::check()) {
            CommentBlog::create([
                'name' => Auth::user()->name,
                'body' => $request->input('body'),
                'user_id' => $request->user_id,
                'blog_id'=>$request->blog_id,
            ]);


            return redirect()->back()->with('success','Comment Added successfully..!');
        }else{
            return back()->withInput()->with('error','Something wrong');
        }

    }
    public function update(Request $request,$id){
        $updatecomment= CommentBlog::findorFail($id);
        $updatecomment->body=$request->body;
        $updatecomment->save();
        return redirect()->back();
    }
    public function show($id){
        CommentBlog::destroy($id);
        return redirect()->back();
    }
}
