@extends('layouts.guest')
@section('content')
    {{-- component --}}
    <div>
        <div class="flex mb-4 items-center">
            <a href="login"
                class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green border-green hover:bg-green">Login</a>
            <a href="register"
                class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Register</a>
        </div>
    </div>
@endsection
