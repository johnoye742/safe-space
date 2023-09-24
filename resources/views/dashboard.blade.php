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
        <div class="px-10 py-3 ">
            <h1 class="text-3xl">Welcome, {{ Auth::user() -> name }}</h1>

            <h1 class="text-2xl mt-5 mb-2 text-gray-600">Your Rooms</h1>
            <div class="grid lg:grid-cols-4 grid-cols-1 mb-6">
                @if ($rooms == null)
                    <p>You have no rooms created! <a href="{{ route('create-room') }}">Create one</a></p>

                @else
                    @foreach ($rooms as $room)
                        <div class="rounded-lg shadow-2xl shadow-sky-200 flex flex-col px-6 py-4">
                            <h1 class="font-bold text-2xl">{{ $room -> name }}</h1>
                            <p>{{ $room -> description }}</p>
                            <div class="flex flex-row gap-5 flex-wrap">
                                <a href="#" class="px-8 py-3 bg-sky-400 text-white rounded-lg w-fit mt-5 shadow-lg shadow-gray-300 hover:shadow-xl transition-all ease-in-out duration-200">View</a>
                                <a href="{{ route('enter-room', ['id' => $room -> room_id]) }}" class="px-8 py-3 text-sky-400 rounded-lg w-fit mt-5 shadow-lg shadow-gray-300 hover:shadow-xl transition-all ease-in-out duration-200">Enter</a>
                            </div>
                        </div>
                    @endforeach

                @endif


            </div>
            @if ($rooms != null)
                <a href="{{ route('create-room') }}" class="px-8 py-3  bg-sky-400 text-white rounded-lg w-fit shadow-lg shadow-gray-300 hover:shadow-xl transition-all ease-in-out duration-200">+ Create</a>
            @endif
        </div>
    </main>

    <!-- SCRIPT -->
    <script src="{{ asset('js/dropdown.js') }}"></script>
</body>
</html>
