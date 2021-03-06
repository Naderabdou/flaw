<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentBlog extends Model
{
    use HasFactory;
    protected $fillable=['body','user_id','blog_id','name'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function blog(){
        return $this->belongsTo(blog::class,'blog_id');
    }

}
