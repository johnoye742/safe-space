<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Enter a room in SafeSpace">
    <meta name="og:title" content="SafeSpace: Internet of The Free">
    <meta name="og:description" content="Enter a room on SafeSpace. Here at SafeSpace it is a true safe space where you can talk about anything freely without the fear of being watched. SafeSpace offers a ton of opportunities for safe communication giving you the ability to chat anonymously on chat rooms.">
    <title>Enter Room - SafeSpace</title>
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
    <livewire:styles></livewire:styles>
</head>
<body class="h-full">
    <header>
        <livewire:navbar :pos='2'></livewire:navbar>
    </header>

    <main class="h-full -mt-16 bg-[url('{{ asset('images/321266452_804746637965962_2076821837111370885_n.jpg') }}')]">
        <div class="h-full w-full flex flex-col justify-center items-center">
            <div class="w-fit border border-gray-300 p-5 rounded-lg">
                <h1 class="text-2xl">Enter Room</h1>
                <p class="text-red-500">{{ session() -> get('status') }}</p>
                <form method="POST" action="" id="room_form">
                    @csrf
                    <div class="border border-gray-200 p-3 flex flex-col mt-5 rounded-lg custom-input transition-all duration-300 ease-in-out">
                        <label for="id" class="text-md text-gray-500">Room Id</label>
                        @if ($id != null || $id == "")
                            <input type="text" name="room_id" id="id" class="outline-none w-full h-full" placeholder="" value="{{ $id }}">

                        @else
                            <input type="text" name="room_id" id="id" class="outline-none w-full h-full" placeholder="" value="{{ session() -> get('room_id') }}">
                        @endif

                    </div>
                    <div class="border border-gray-200 p-3 flex flex-col mt-5 rounded-lg custom-input transition-all duration-300 ease-in-out">
                        <label for="passcode" class="text-md text-gray-500">Passcode</label>
                        <input type="text" name="passcode" id="passcode" class="outline-none w-full h-full" placeholder="" value="{{ $passcode }}">
                    </div>
                    <div class="flex flex-row gap-2 p-3">
                        <input type="checkbox" name="annonymous" id="anon">
                        <label for="anon" class="text-gray-500">Annonymous</label>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-sky-400 text-white rounded-lg w-fit mt-5 float-right">Enter</button>
                </form>
            </div>
        </div>
    </main>

    <!-- SCRIPTS -->
    <livewire:scripts></livewire:scripts>

    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script src="{{ asset('js/toast.js') }}"></script>
</body>
</html>
