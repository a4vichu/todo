<div class="flex justify-between w-full min-h-[60px] sticky top-0 z-50 bg-[#2b76bb] px-6 p-2 shadow-md text-white text-center items-center">
    <a href="home">Home</a>
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>