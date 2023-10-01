<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rooms</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
</head>
<body>
    <header>
        @livewire('nav', ['color' => 'text-black', 'position' => 'relative'])
    </header>

    <body>
        <div class="lg:px-8 px-5 py-8">
            <h1 class="text-2xl">All Rooms</h1>
            <div class="grid lg:grid-cols-4 gap-5 pt-5 grid-cols-1 mb-6">
                @if ($rooms == null)
                    <p>You have no rooms created! <a href="{{ route('create-room') }}">Create one</a></p>

                @else
                    @foreach ($rooms as $room)
                        @livewire('room-card', ['title' => $room -> name, 'description' => $room -> description, 'room_id' => $room -> room_id])
                        <!--  -->
                    @endforeach
                @endif


            </div>
        </div>
    </body>

    <!-- SCRIPT -->
    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
