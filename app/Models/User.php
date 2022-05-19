<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use function Symfony\Component\Translation\t;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city_id',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    public  function chat(){
        return $this->hasMany(chat::class,'user_id');
    }
    public function comments(){
        return $this->hasMany(comment::class,'user_id');
    }
    public function messages(){
        return $this->hasMany(message::class,'user_id');
    }
    public function getNameAttribute($key)
    {
        return ucfirst($key);
    }
    public function receivesBroadcastNotificationsOn(){
        return 'App.Models.User.'.$this->id;
    }
    public function routeNotificationForNexmo($notification)
    {
        return $this->phone;
    }


}
