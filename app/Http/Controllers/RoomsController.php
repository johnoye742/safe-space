<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class RoomsController extends Controller
{
    //
    public function createRoom(Request $request) {
        Log::debug($request);
        $data = $request -> validate([
            'room_name' => 'required|unique:rooms,name',
            'passcode' => 'nullable',
            'description' => 'required',
            'availability' => 'required',
        ]);

        Log::alert($data);
        $creator = Auth::user() -> username;

        $options = [
            'name' => $data['room_name'],
            'creator' => $creator,
            'room_id' => substr(Crypt::encryptString($data['room_name']), 10, 10),
            'passcode' => $data['passcode'],
            'description' => $data['description'],
            'availability' => strtolower($data['availability'])
        ];



        $room = new Room($options);
        if($room -> save()) {
            Session::flash('room_id', $options['room_id']);
            return redirect('/enter-room');
        }
    }

    public function generate() {
        $length = intval(readline());
        $characters = "~!@#$%^&*()-_=+{}<>?|\\/0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $c1 = str_split($characters);
        $sb = "";

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, count($c1) - 1);
            $sb .= $c1[$randomIndex];
        }

        return $sb;
    }

    public function enterRoom(Request $request) {

        $data = $request -> validate([
            'room_id' => 'required',
            'passcode' => 'required',
            'annonymous' => 'nullable'
        ]);

        Log::alert($request);

        $room = Room::all() -> where('room_id', '=', $data['room_id']) -> where('passcode', '=', $data['passcode']);
        if($room -> first() != null && $room != [] && !empty($room)) {
            Log::debug($room);
            Session::put('current_room', $room -> first() -> room_id);

            if($request['annonymous'] != null)
            Session::put('annonymous', $data['annonymous']);
            else
            Session::put('annonymous', 'off');

            return redirect('/rooms'.'/'.$room -> first() -> room_id);
        }
        return redirect() -> back();
    }
}
