<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Causes_glitch extends Model
{
    use HasFactory;
    protected $fillable=['causes'];
    public function Imbalance(){
        return $this->hasMany(Imbalance::class,'causes_glitch_id');
    }
}
