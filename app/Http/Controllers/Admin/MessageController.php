<?php

namespace App\Http\Controllers\Admin;

use App\Events\MessageSend;
use App\Events\sendEvent;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Event;

class MessageController extends Controller
{
    function index(){
        $messages=message::all();
        return view('dashboard.message.index',compact('messages'));
    }
  /*  function store(Request $request){


        $message=auth()->user()->messages()->create($request->all());
        broadcast(new MessageSend($message))->toOthers();
        return redirect()->back();

    }*/
    public function send(Request $request){
        $message=auth()->user()->messages()->create($request->all());
        broadcast(new sendEvent($message))->toOthers();


    }
}
