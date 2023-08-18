<div>
    <div class="bg-white flex flex-row justify-between w-full px-8 py-5">
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-2xl">SafeSpace</h1>
        </div>
        <ul class="lg:flex flex-row gap-5 items-center hidden ">
            <li><a href="" class="hover:text-sky-500 text-sky-600">Home</a></li>
            <li><a href="" class="hover:text-sky-500">Dashboard</a></li>
        </ul>
        <div class="lg:flex flex-row items-center gap-3 hidden">
            <div class="bg-gray-100 pl-5 gap-3 py-2 flex flex-row rounded-lg">
                <i class="fi fi-rr-search text-xl"></i>
                <input type="search" class="bg-[#00000000] w-full" placeholder="Search">
                
            </div>
            @if (auth() -> check() != null)
                <div class="relative mr-11" id="dropdown-wrapper">
                    <img src="https://api.dicebear.com/6.x/initials/svg?seed={{ auth() -> user() -> name }}" id="toggle" class="w-12 h-12 rounded-full">
                    <div class="absolute shadow-lg rounded-lg flex-col w-28 mt-1 bg-gray-100 hidden z-30 overflow-hidden" id="dropdown">
                        <a href="#" class="px-3 py-2 border-b border-b-gray-200 hover:bg-gray-200">Settings</a>
                        <a href="{{ route('logout') }}" class="px-3 py-2 border-b border-b-gray-200 hover:bg-gray-200">Log out</a>
                    </div>
                </div>
                
            @endif
            
    
            
        </div>
    
        <div class="lg:hidden flex flex-col justify-center">
            <i class="fi fi-br-menu-burger text-2xl" id="toggle"></i>
        </div>
    </div>

    <div class="hidden w-full -ml-[100%] h-full fixed top-0 bg-yellow-300 text-black flex flex-col px-5 py-12 transition-all duration-300 ease-in-out delay-300" id="nav">
        <i class="fi fi-br-cross fixed top-5 right-5" id="cancel"></i>
        <div class="bg-transparent border border-black pl-5 gap-3 py-2 flex flex-row rounded-lg">
            <i class="fi fi-rr-search text-xl"></i>
            <input type="search" class="bg-[#00000000] w-full" placeholder="Search">
            
        </div>

        <ul class="flex flex-col gap-5 mt-3">
            <li><a href="" class="text-yellow-600 hover:text-yellow-600">Home</a></li>
            <li><a href="" class="hover:text-yellow-500">Shop</a></li>
            <li><a href="" class="hover:text-yellow-500">About Us</a></li>
            <li><a href="" class="hover:text-yellow-500">Contact Us</a></li>
        </ul>

        
    </div>
</div>