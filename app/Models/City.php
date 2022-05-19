<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','code'
    ];
    public function user(){
        return $this->hasMany(User::class,'city_id');
    }
    public function Imbalance(){
        return $this->hasMany(Imbalance::class,'city_id');
    }

}
