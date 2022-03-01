@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="">
            <div class="">
                <div class="">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="main-content">
                            <div class="main_content_inner">
                                <div class="w-full max-w-xl m-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                    <form  action="{{ route('search.location') }}" method="post" class="">
                                        @csrf
                                        <div class="flex items-center border-b border-teal-500 py-2">
                                            <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Enter a new location" name="searchString" value="{{$searchString}}">
                                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Search
                                            </button>
                                        </div>
                                    </form>
                                    <div class="mx-auto p-4 flex justify-center">
                                        <div class="flex flex-wrap">
                                            <div class="w-full px-2">
                                                <div class="bg-gray-900 text-white relative min-w-0 break-words rounded-lg overflow-hidden shadow-sm mb-4 w-full bg-white dark:bg-gray-600">
                                                    <div class="px-6 py-6 relative">
                                                        <div class="flex mb-4 justify-between items-center">
                                                            <div>
                                                                <h5 class="mb-0 font-medium text-xl">{{ $currentForecast['name'] }}</h5>
                                                                <h6 class="mb-0"> <p class="text-gray-400">{{(strtoupper(\Carbon\Carbon::createFromTimestamp($currentForecast['dt'])->format('D M Y')))}}</p></h6><small>Cloudy</small>
                                                            </div>
                                                            <div class="text-right">
                                                                <h3 class="font-bold text-4xl mb-0"><span>{{ round($currentForecast['main']['temp']) }}°</span></h3>
                                                                <img src="http://openweathermap.org/img/wn/{{ $currentForecast['weather'][0]['icon'] }}@2x.png" alt="icon">
                                                            </div>
                                                        </div>
                                                        <div class="block sm:flex justify-between items-center flex-wrap">
                                                            <div class="w-full sm:w-1/2">
                                                                <div class="flex mb-2 justify-between items-center"><span>Temp</span><small class="px-2 inline-block">{{ round($currentForecast['main']['temp']) }}°</small></div>
                                                            </div>
                                                            <div class="w-full sm:w-1/2">
                                                                <div class="flex mb-2 justify-between items-center"><span>Feels like</span><small class="px-2 inline-block">{{ round($currentForecast['main']['feels_like']) }}°</small></div>
                                                            </div>
                                                            <div class="w-full sm:w-1/2">
                                                                <div class="flex mb-2 justify-between items-center"><span>Temp min</span><small class="px-2 inline-block">{{ round($currentForecast['main']['temp_min']) }}°</small></div>
                                                            </div>
                                                            <div class="w-full sm:w-1/2">
                                                                <div class="flex mb-2 justify-between items-center"><span>Temp max</span><small class="px-2 inline-block">{{ round($currentForecast['main']['temp_max']) }}°</small></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="divider table mx-2 text-center bg-transparent whitespace-nowrap"><span class="inline-block px-3"><small>Forecast</small></span></div>
                                                    <div class="px-6 py-6 relative">
                                                        <div class="text-center justify-between items-center flex" style="flex-flow: initial;">
                                                            @foreach($weeklyForecast as $weather )
                                                                <div class="text-center mb-0 flex items-center justify-center flex-col"><span class="block my-1">{{(strtoupper(\Carbon\Carbon::createFromTimestamp($weather['dt'])->format('D')))}}</span><img src="http://openweathermap.org/img/wn/{{ $weather['weather'][0]['icon'] }}@2x.png" alt="icon"  class="block w-8 h-8"><span class="block my-1">{{$weather['weather'][0]['description']}}</span></div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
