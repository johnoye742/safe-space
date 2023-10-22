<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\Messaging;
use App\Http\Controllers\RoomsController;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $rooms = Room::all();
    return view('welcome', ['rooms' => $rooms]);
}) -> name('landing-page');

Route::get('/test', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    $rooms = Room::all() -> where('creator', Auth::user() -> username);
    return view('dashboard', ['rooms' => $rooms]);
})
-> name('dashboard') -> middleware('auth');

Route::get('/rooms/{id}', function ($id) {
    Log::debug(Session::get('current_room'));
    if(Session::get('current_room') != $id) {
        Session::flash('status', "You are not in this room yet! Use this form to enter.");
        return redirect('/enter-room');
    }
    $room = Room::all() -> where('room_id', null, $id);
    $messages = Message::all() -> where('channel', strtolower($id));
    Log::debug($messages);
    Log::alert($room);
    $name = $room -> first() -> name;
    return view('room', ['room_id' => $id, 'room_name' => $name, 'messages' => $messages, 'descr' => $room -> first -> description]);
}) -> name('room')
-> middleware('auth');

Route::get('/messages/{id}', function ($id){
    $messages = Message::all() -> where('channel', strtolower($id));
    return $messages;
});

Route::get('/rooms', function(Request $req) {
    $rooms = Room::all();
    return view('all-rooms', ['rooms' => $rooms]);
}) -> name('all-rooms');

Route::get('/create-room', function () {
    return view('create-room');
}) -> name('create-room')
-> middleware('auth');

Route::post('/create-room', [RoomsController::class, 'createRoom'])
-> name('create-room')
-> middleware('auth');

Route::get('/enter-room', function (Request $request) {

    $id = $request -> get('id');

    $passcode = Room::all() -> where('room_id', $id) -> first() -> passcode;

    return view('enter-room', ['id' => $id, 'passcode' => $passcode]);
}) -> name('enter-room');

Route::post('/enter-room', [RoomsController::class, 'enterRoom'])
-> name('enter-room');

Route::get('/login', function () {
    return view('login');
}) -> name('login');

Route::get('sign-up', function () {
    return view('sign-up');
}) -> name('sign-up');

Route::get('/logout', [Authentication::class, 'logout']) -> name('logout');

Route::post('create-account', [Authentication::class, 'createAccount'])
-> name('create-account');

Route::post('login', [Authentication::class, 'login'])
-> name('login');

Route::post('/send-message', [Messaging::class, 'sendMessages'])
-> name('send-messages');

Route::get('/upload', function () {
    return view('upload');
});

Route::post('/upload-file', function (Request $req) : string {


    $file = 'Authentication@createAccount';
    if($req -> hasFile('file')) $file = Storage::put('public', $req -> file('file'));

    return asset(Storage::url($file));
}) -> name('upload');

Route::get('/truncate', function () {
    DB::table('messages') -> truncate();
});

Route::get('/encr-test/{str}', function ($str) {
    return Crypt::encrypt($str);
});

Route::post('/decrypt', function (Request $request) {
    return Crypt::decryptString($request -> get('str'));
});
