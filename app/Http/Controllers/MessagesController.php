<?php

use App\User;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function store(Request $request){

        $message = new Message;
        $message->to = $request->to;
        $message->from = $request->from;
        $message->text = $request->text;

        $message->save();

    }
}
