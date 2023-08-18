<div class="self-end border border-gray-200 px-5 py-4 w-full">
    <form class="w-full flex flex-row gap-3 items-center" id="msg">
        @csrf
        <input type="hidden" value="{{ strtolower(str_replace(' ', '-', $room_name)) }}" name="channel" id="roomName">
        <input type="hidden" value="{{ route('send-messages') }}" id="link">
        <input type="hidden" value="{{ auth() -> user() -> username }}" id="username">
        @if (session() -> get('annonymous') != 'on')
            <input type="hidden" value="{{ auth() -> user() -> name }}" name="name" id="user_name">
        @endif
        
        <textarea class="w-full border border-gray-200 p-2" name="msg" placeholder="Type a message..."></textarea>

        <button type="submit" class="rounded-full px-4 py-3 text-center text-white bg-sky-400 h-fit w-fit">
            <i class="fi fi-ss-paper-plane-top m-0 p-0"></i>
        </button>
    </form>
</div>
