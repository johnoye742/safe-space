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
        <div class="px-10 py-3">
            <h1 class="text-3xl">Welcome, {{ Auth::user() -> name }}</h1>
        </div>
    </main>

    <!-- SCRIPT -->
    <script src="{{ asset('js/dropdown.js') }}"></script>
</body>
</html>
