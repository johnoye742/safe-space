<?php

namespace App\Http\Controllers;

use App\Events\Messaging as EventsMessaging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Messaging extends Controller
{
    //
    public function sendMessages(Request $request) {
        $data = $request -> validate([
            'msg' => 'required',
            'channel' => 'required',
            'name' => 'nullable',
            'username' => 'required',
            'image', 'nullable',
            'type' => 'nullable'
        ]);


        Log::debug($data);

        EventsMessaging::dispatch($data);
    }
}
