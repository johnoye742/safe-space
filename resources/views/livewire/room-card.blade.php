<div class="rounded-lg shadow-lg shadow-sky-200 relative flex flex-col px-6 py-4">
    <h1 class="font-bold text-2xl">{{ $title }}</h1>
    <p>{{ $description }}</p>
    <div class="flex flex-row gap-3 flex-wrap float-end place-self-end justify-self-end bottom-0 mb-0">
        <a href="#" class="px-8 py-3 bg-sky-400 text-white rounded-lg w-fit mt-5 shadow-lg shadow-gray-300 hover:shadow-xl transition-all ease-in-out duration-200">View</a>
        <a href="{{ route('enter-room', ['id' => $room_id]) }}" class="px-8 py-3 text-sky-400 rounded-lg w-fit mt-5 shadow-lg shadow-gray-300 hover:shadow-xl transition-all ease-in-out duration-200">Enter</a>
    </div>
</div>
