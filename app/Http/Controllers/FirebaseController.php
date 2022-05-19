<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class FirebaseController extends Controller
{
    public function index()
    {
        Nexmo::message()->send([
           'to'=>'+201092848392',
            'from'=>'laravel',
            'text'=>'hallo nader'
        ]);
echo 'message sent';
    }
}
