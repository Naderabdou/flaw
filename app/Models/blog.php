<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $fillable=['name_blog','desc_blog','name','file','editor_full'];
    public function comments(){
        return $this->hasMany(CommentBlog::class,'blog_id');
    }

}
