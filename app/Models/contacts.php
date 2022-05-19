<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    use HasFactory;
    protected $fillable=[
        'link_fac',
        'link_github',
        'link_insta',
        'link_whats',
        'name',
        'email',
        'phone',
        'message'
    ];
}
