<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="Explore SafeSpace. Here at SafeSpace it is a true safe space where you can talk about anything freely without the fear of being watched. SafeSpace offers a ton of opportunities for safe communication giving you the ability to chat anonymously on chat rooms.">
    <meta name="og:title" content="SafeSpace: Internet of The Free">
    <meta name="og:description" content="Explore SafeSpace. Here at SafeSpace it is a true safe space where you can talk about anything freely without the fear of being watched. SafeSpace offers a ton of opportunities for safe communication giving you the ability to chat anonymously on chat rooms.">
    <title>Rooms - SafeSpace</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
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
