<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SafeSpace</title>

        <!-- Fonts -->
        <!--<link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --->

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <livewire:nav></livewire:nav>

        <main>
            <div class="md:px-10 px-4 grid grid-cols-1 lg:grid-cols-2 py-32 !bg-blend-multiply !bg-no-repeat !bg-cover !bg-center text-white" style="background: url({{ asset('images/1422119.jpg') }}) rgba(56, 189, 248, 60)">
                <div class="">
                    <h1 class="text-6xl uppercase">A place where <span class=" text-sky-200">freedom</span> truly <span class=" text-sky-200">exists</span></h1>
                    <p class="mt-3">Here at SafeSpace it is a true safe space where you can talk about anything freely without the fear of being watched. SafeSpace offers a ton of opportunities for safe communication giving you the ability to chat anonymously on chat rooms.</p>
                    <div class="w-full flex flex-row gap-5">
                        <a href="{{ route('sign-up') }}" class="px-8 py-3 bg-transparent hover:bg-sky-500 hover:bg-opacity-50 border border-sky-400 text-white rounded-lg w-fit mt-5">Join Now</a>
                        <a href="" class="px-8 py-3 bg-sky-400 text-white rounded-lg w-fit mt-5">Learn More</a>
                    </div>
                </div>

            </div>

            <div class="w-full my-5 mb-14">
                <h1 class="text-3xl text-center">About The Developer</h1>
                <div class="grid lg:grid-cols-4 grid-cols-1 my-5 px-12">
                    <div class="rounded-lg shadow-2xl shadow-sky-200 flex flex-col items-center">
                        <img src="{{ asset('images/321266452_804746637965962_2076821837111370885_n.jpg') }}" class="w-32 h-32 object-cover rounded-full shadow-lg shadow-gray-200">
                        <div class="p-5">
                            <h1 class="text-2xl text-center mb-2">John Oye</h1>
                            <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia nisi quo, quae dolorem, saepe magni laboriosam repellat distinctio quaerat aperiam, nemo facilis temporibus sed necessitatibus ex aut a debitis officiis!</p>
                            <div class="text-center my-3">
                                <a href="https://johnoye742.netlify.app" target="_blank" class="px-8 py-3 bg-sky-400 text-white rounded-lg w-fit mt-5 shadow-lg shadow-gray-300 hover:shadow-xl transition-all ease-in-out duration-200">View Portfolio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
