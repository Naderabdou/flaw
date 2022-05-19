<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable=['body','user_id','imbalance_id','name'];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function blog(){
        return $this->belongsTo(blog::class,'blog_id');
    }
    public function imbalance(){
    return $this->belongsTo(Imbalance::class,'imbalance_id');
    }
    public function replies(){
        return $this->hasMany(Replies::class,'comment_id');
    }
}
