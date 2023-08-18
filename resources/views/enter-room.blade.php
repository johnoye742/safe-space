<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <livewire:styles></livewire:styles>
</head>
<body class="h-full">
    <header>
        <livewire:navbar></livewire:navbar>
    </header>

    <main class="h-full -mt-16 bg-[url('{{ asset('images/321266452_804746637965962_2076821837111370885_n.jpg') }}')]">
        <div class="h-full w-full flex flex-col justify-center items-center">
            <div class="w-fit border border-gray-300 p-5 rounded-lg">
                <h1 class="text-2xl">Enter Room</h1>
                <p class="text-red-500">{{ session() -> get('status') }}</p>
                <form method="POST" action="">
                    @csrf
                    <div class="border border-gray-200 p-3 flex flex-col mt-5 rounded-lg custom-input transition-all duration-300 ease-in-out">
                        <label for="id" class="text-md text-gray-500">Room Id</label>
                        <input type="text" name="room_id" id="id" class="outline-none w-full h-full" placeholder="">
                    </div>
                    <div class="border border-gray-200 p-3 flex flex-col mt-5 rounded-lg custom-input transition-all duration-300 ease-in-out">
                        <label for="passcode" class="text-md text-gray-500">Passcode</label>
                        <input type="text" name="passcode" id="passcode" class="outline-none w-full h-full" placeholder="">
                    </div>
                    <div class="flex flex-row gap-2 p-3">
                        <input type="checkbox" value="checked" name="annonymous" id="anon">
                        <label for="anon" class="text-gray-500">Anonymous</label>
                    </div>
    
                    <button type="submit" class="px-4 py-2 bg-sky-400 text-white rounded-lg w-fit mt-5 float-right">Enter</button>
                </form>
            </div>
        </div>
    </main>

    <!-- SCRIPTS -->
    <livewire:scripts></livewire:scripts>
</body>
</html>