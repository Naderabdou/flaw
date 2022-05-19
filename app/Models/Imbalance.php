<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;
use function Symfony\Component\Translation\t;

class Imbalance extends Model
{
    use Rateable;
    use HasFactory;
    protected $fillable=[
        'bug_name',
        'Bug_tool',
        'causes_name',
        'bug_desc',
        'status',
        'city_id',
        'fault_side_id',
        'causes_glitch_id',
        'user_id'

    ];
   public function city(){
       return $this->belongsTo(City::class,'city_id');
   }
   public function fault_side(){
       return $this->belongsTo(Fault_side::class,'fault_side_id');
   }
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
   public function causes_glitch(){
       return $this->belongsTo(Causes_glitch::class,'causes_glitch_id');
   }
   public function comment(){
       return $this->hasMany(comment::class,'imbalance_id');
   }
   public function rate(){
       return $this->hasMany(rate::class,'imbalance_id');
   }
   public function attachment(){
       return $this->hasMany(Attachments::class,'imbalance_id');
   }

}
