<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fault_side extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    public function Imbalance(){
        return $this->hasMany(Imbalance::class,'fault_side_id');
    }
}
