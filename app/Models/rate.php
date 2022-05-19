<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    use HasFactory;
    protected $fillable=['rate',
        'comment','item_id','imbalance_id'];
    public function item(){
        return $this->belongsTo(items::class,'item_id');
    }
    public function imbalance (){
        return $this->belongsTo(Imbalance::class,'imbalance_id');
    }
}
