<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst($room_name) }} - SafeSpace</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    <livewire:styles></livewire:styles>
</head>
<body class="h-full bg-gray-100">
    <header>
        <livewire:navbar></livewire:navbar>
    </header>

    <main class="h-full w-full flex flex-col">
        <div class="p-5 w-full border-b border-b-gray-200 flex flex-row justify-between items-center">
            <div class="flex flex-col">
                <h1># {{ ucfirst($room_name) }}</h1>
                <p class="text-green-500">online</p>
            </div>

            <div>

                <div class="relative" id="dropdown-wrapper">
                    <i class="fi fi-rr-menu-dots-vertical" id="toggle"></i>
                    <div class="absolute shadow-lg rounded-lg flex-col w-32 mt-1 -left-28 bg-gray-100 hidden z-20 overflow-hidden" id="dropdown">
                        <a href="#" class="px-3 py-2 border-b border-b-gray-200 hover:bg-gray-200">Chat Settings</a>
                        <a href="#" class="px-3 py-2 border-b border-b-gray-200 text-red-600 hover:bg-gray-200">Leave Chat</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-h-[80vh] h-[80vh] w-full overflow-y-scroll p-6 flex flex-col !bg-no-repeat !bg-cover !bg-center" style="background: url({{ asset('images/b.jpeg') }});" id="main">
            <div class="flex flex-row m-5 gap-2">
                <div class="relative self-end" id="dropdown-toast">
                    <img src="https://api.dicebear.com/6.x/initials/svg?seed=Admin" class="w-5 h-5 rounded-full" id="toggle">
                    <span class="absolute shadow-lg rounded-lg flex-col w-fit mt-1 bg-slate-500 bg-opacity-70 hidden z-20 overflow-hidden px-3 py-1 text-white -left-5" id="toast">@admin</span>
                </div>

                <p class="bg-sky-500 p-3 w-fit self-start text-white rounded-lg max-w-[50%] ">Welcome to {{ $room_name }}</p>
            </div>

            <!-- Unnecessary for the actual app lol -->
            <div class="hidden flex-row-reverse w-fit self-end m-5 gap-2 max-w-[50%] -left-20">

            </div>

        </div>
        <div class="self-end border border-gray-200 px-5 py-4 w-full">
            <form class="w-full flex flex-row gap-3 items-center" id="msg">
                @csrf
                <input type="hidden" value="{{ strtolower(str_replace(' ', '-', $room_name)) }}" name="channel" id="roomName">
                <input type="hidden" value="{{ route('send-messages') }}" id="link">
                <input type="hidden" value="{{ auth() -> user() -> username }}" name="username" id="username">

                @if (session() -> get('annonymous') != 'checked')
                    <input type="hidden" value="{{ auth() -> user() -> name }}" name="name" id="user_name">
                @else
                <input type="hidden" value="Annonymous{{ auth() -> user() -> id }}" name="name" id="user_name">
                @endif



                <textarea class="w-full border border-gray-200 p-2" name="msg" placeholder="Type a message..."></textarea>

                <button type="submit" class="rounded-full px-4 py-3 text-center text-white bg-sky-400 h-fit w-fit">
                    <i class="fi fi-ss-paper-plane-top m-0 p-0"></i>
                </button>
            </form>
        </div>

    </main>

    <!-- SCRIPTS -->
    <livewire:scripts></livewire:scripts>
    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script src="{{ asset('js/toast.js') }}"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="{{ asset('js/receive-messages.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
