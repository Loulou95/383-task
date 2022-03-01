@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="w-full max-w-xl m-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @foreach($userList as $user)
                <div class="flex flex-wrap justify-between items-center">
                    <p>{{$user->name}}</p>
                    <button>Update</button>
                </div>
            @endforeach

        </div>
    </div>
@endsection
