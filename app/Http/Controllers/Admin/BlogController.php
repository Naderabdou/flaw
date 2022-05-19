<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\blog;
use App\Models\Imbalance;
use App\Models\splash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Symfony\Component\String\s;

class BlogController extends Controller
{
    public function index(){
       $blog= blog::get();
        return view('dashboard.blog.index',compact('blog'));

    }
    public function store(BlogRequest $request){

        $data=$request->validated();

           if ($data['file'] != ''){
               $path=Storage::disk('public')->putFile('/blog',$request->file);
               $data['file']=$path;




       }
        $create= blog::create(

              $data

            );
        return redirect()->back();



    }
    public function update(UpdateBlogRequest $request, $id){
        $arr=[];
        $blog=  blog::findOrFail($id);
      $data=$request->validated();
            if ($data['file'] != ''){
                $path=Storage::disk('public')->putFile('/blog',$request->file);
                $data['file']=$path;

        }
        $blog->update($data);
        return redirect()->back();



    }
    public function read($id){
      $read=  blog::with('comments')->findorFail($id);
      return view('dashboard.blog.single_blog',compact('read'));
    }
    public function show($id){
        blog::destroy($id);
        return redirect()->back();
    }


}
