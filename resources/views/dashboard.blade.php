<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SafeSpace</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <livewire:styles></livewire:styles>
</head>
<body>
    <header>
        <livewire:navbar :pos='1'></livewire:navbar>
    </header>

    <main>
        <div class="px-5 lg:px-10 py-3 ">
            <h1 class="text-3xl">Welcome, {{ Auth::user() -> name }}</h1>

            <h1 class="text-2xl mt-5 mb-2 text-gray-600">Your Rooms</h1>
            <div class="grid lg:grid-cols-4 gap-5 grid-cols-1 mb-10">
                @if ($rooms == null || $rooms == [] || empty($rooms))
                    <p>You have no rooms created! <a href="{{ route('create-room') }}">Create one</a></p>

                @else
                    @foreach ($rooms as $room)
                        @livewire('room-card', ['title' => $room -> name, 'description' => $room -> description, 'room_id' => $room -> room_id])
                        <!--  -->
                    @endforeach

                @endif


            </div>
            <div class="flex flex-row gap-5 w-full flex-wrap">
                @if ($rooms != null)
                    <a href="{{ route('create-room') }}" class="px-8 py-3 h-fit bg-sky-400 text-white rounded-lg w-fit shadow-lg shadow-gray-300 hover:shadow-xl transition-all ease-in-out duration-200">+ Create</a>
                    <a href="{{ route('enter-room') }}" class="px-8 py-3 text-sky-400 rounded-lg w-fit shadow-lg shadow-gray-300 hover:shadow-xl transition-all ease-in-out duration-200">Enter Room</a>
                @endif
            </div>
        </div>
    </main>

    <!-- SCRIPT -->
    @livewireStyles
    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
