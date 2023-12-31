<?php

namespace App\Http\Controllers;

use App\Events\Messaging as EventsMessaging;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class Messaging extends Controller
{
    //
    public function sendMessages(Request $request) {
        Log::debug('request: ' . $request->get('image'));
        $data = $request->validate([
            'msg' => 'required',
            'channel' => 'required',
            'name' => 'nullable',
            'username' => 'required',
            'image' => 'nullable',
            'type' => 'nullable',
        ]);

        $data['msg'] = Crypt::encryptString($data['msg']);

        EventsMessaging::dispatch($data);

        $message = new Message($data);

        $message->save();
    }
}
