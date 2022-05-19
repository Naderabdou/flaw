<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;
    protected $fillable=[
        'comment_id',
        'name',
        'reply',
        'user_id'];
    public function comments(){
        return $this->belongsTo(Replies::class,'comment_id');
    }
}
