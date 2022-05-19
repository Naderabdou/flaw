<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    use HasFactory;
    protected $fillable=['file','imbalance_id'];
    public function imbalance(){
        return $this->belongsTo(Imbalance::class,'imbalance_id');
    }
    public function blog(){
        return $this->belongsTo(blog::class,'blog_id');
    }


}
