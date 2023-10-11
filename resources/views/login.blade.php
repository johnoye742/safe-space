<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
<body class="h-full">
    <header>
        @livewire('nav', ['color' => 'text-black', 'position' => 'relative'])
    </header>

    <main class="h-full">
        <div class="grid lg:grid-cols-2 grid-cols-1 w-full h-full">
            <img src="https://images.unsplash.com/photo-1685981336017-5651466a7087?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80" class="hidden lg:block">
            <div class="flex flex-col px-5 py-10">
                <h1 class="text-2xl">Welcome Back</h1>
                <h1 class="text-5xl">LOGIN</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @foreach ($errors -> get('email') as $error)
                        <p class="text-red-700">{{ $error }}</p>
                    @endforeach
                    <div class="border border-gray-200 p-3 flex flex-col mt-5 rounded-lg custom-input transition-all duration-300 ease-in-out">
                        <label for="email" class="text-md text-gray-500">Email address</label>
                        <input type="email" name="email" id="email" class="outline-none w-full h-full" placeholder="johndoe@email.com" value="{{ old('email') }}">
                    </div>



                    <div class="border border-gray-200 p-3 flex flex-col mt-5 rounded-lg custom-input transition-all duration-300 ease-in-out">
                        <label for="password" class="text-md text-gray-500">Password</label>
                        <input type="password" id="password" name="password" class="outline-none w-full h-full" placeholder="">
                    </div>

                    @foreach ($errors -> get('password') as $error)
                        <p class="text-red-700">{{ $error }}</p>
                    @endforeach


                    <input type="hidden" name="next_page" value="{{ session() -> get('next_page') }}">

                    <button type="submit" class="px-8 py-3 bg-sky-400 text-white rounded-lg w-fit mt-5">Login</button>
                    <span class="mt-2">Don't have an account? <a href="{{ route('sign-up') }}" class="text-sky-800">Sign Up</a></span>

                </form>
                <div class="flex flex-row gap-4 border-t-black border-t mt-3 flex-wrap">
                    <button type="submit" class="px-5 py-3 bg-transparent border border-sky-600 cursor-pointer hover:bg-sky-600 transition-all duration-300 ease-in-out text-black rounded-lg w-fit mt-3 flex flex-row gap-2 items-center"><img src="{{ asset('icons/facebook.png') }}">  Continue with Facebook</button>
                    <button type="submit" class="px-5 py-3 bg-transparent border border-sky-600 cursor-pointer hover:bg-sky-600 transition-all duration-300 ease-in-out text-black rounded-lg w-fit mt-3 flex flex-row gap-2 items-center"><img src="{{ asset('icons/google.png') }}">  Continue with Google</button>

                </div>
            </div>
        </div>
    </main>

    <!-- SCRIPTS -->
    <script src="{{ asset('js/inputs.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
