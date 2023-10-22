<div>
    <div class="bg-white @if ($color != null || $color != "")
       {{ $color }}
    @else
    text-white
    @endif  shadow-lg flex flex-row justify-between w-full px-8 py-5 @if ($position != null)
       {{ $position }}
    @else
        fixed
    @endif  top-0 transition-all ease-in-out duration-200" id="navbar">
        <div class="flex flex-col justify-center items-center">
            <a href="{{ route('landing-page') }}" class="text-2xl inline-flex items-center"><img src="{{ asset('favicon.ico') }}" class="w-6 h-6 rounded-full"> <span>afeSpace</span></a>
        </div>
        <ul class="lg:flex flex-row gap-5 items-center hidden ">
            <li><a href="{{ route('landing-page') }}" class="hover:text-sky-500 text-sky-300">Home</a></li>
            @auth
                <li><a href="{{ route('dashboard') }}" class="hover:text-sky-500">Dashboard</a></li>
            @endauth

            <li><a href="" class="hover:text-sky-500">About Us</a></li>
        </ul>
        <div class="lg:flex flex-row items-center gap-3 hidden">
            <div class="bg-gray-100 pl-5 gap-3 py-2 flex flex-row rounded-lg">
                <i class="fi fi-rr-search text-xl"></i>
                <input type="search" class="bg-[#00000000] w-full" placeholder="Search">

            </div>
            @auth
                <div class="relative mr-11 text-black" id="dropdown-wrapper">
                    <img src="https://api.dicebear.com/6.x/initials/svg?seed={{ auth() -> user() -> name }}" id="toggle" class="w-12 h-12 rounded-full">
                    <div class="absolute shadow-lg rounded-lg flex-col w-28 mt-1 bg-gray-100 hidden z-30 overflow-hidden" id="dropdown">
                        <a href="#" class="px-3 py-2 border-b border-b-gray-200 hover:bg-gray-200">Settings</a>
                        <a href="{{ route('logout') }}" class="px-3 py-2 border-b border-b-gray-200 hover:bg-gray-200">Log out</a>
                    </div>
                </div>

            @else
                <div>
                    <a href="{{ route('login') }}" class="px-8 py-3 bg-sky-400 text-white rounded-lg w-fit mt-5">Login</a>
                </div>

            @endauth



        </div>

        <div class="lg:hidden flex flex-row gap-3 justify-center">
            @if (auth() -> check() != null)
                <img src="https://api.dicebear.com/6.x/initials/svg?seed={{ auth() -> user() -> name }}" id="toggle" class="w-6 h-6 rounded-full">
            @endif
            <i class="fi fi-br-menu-burger text-2xl" id="menu-toggle"></i>
        </div>
    </div>

    <div class="hidden w-full -ml-[100%] h-full fixed top-0 bg-sky-300 text-black flex-col px-5 py-12 transition-all duration-300 ease-in-out delay-300 z-20" id="nav">
        <i class="fi fi-br-cross fixed top-5 right-5" id="cancel"></i>
        <div class="bg-transparent border border-black pl-5 gap-3 py-2 flex flex-row rounded-lg">
            <i class="fi fi-rr-search text-xl"></i>
            <input type="search" class="bg-[#00000000] w-full" placeholder="Search">

        </div>

        <ul class="flex flex-col gap-5 mt-3">
            <li><a href="{{ route('landing-page') }}" class="text-sky-600 hover:text-sky-600">Home</a></li>

            @auth
                <li><a href="{{ route('dashboard') }}" class="hover:text-sky-500">Dashboard</a></li>
            @endauth

            <li><a href="" class="hover:text-sky-500">About Us</a></li>


            <div class="mt-5">
                @auth
                    <li><a href="{{ route('logout') }}" class=" text-red-500">Logout</a></li>

                @else
                    <li><a href="{{ route('login') }}" class="hover:text-sky-500">Login</a></li>
                @endauth
            </div>
        </ul>


    </div>
</div>
