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
                                <form  action="{{ route('search.location') }}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-xl m-auto">
                                    @csrf
                                    <div class="flex items-center border-b border-teal-500 py-2">
                                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Enter a new location" name="searchString" value="{{$searchString}}">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Search
                                        </button>
                                    </div>
                                </form>
                                <div class="w-full max-w-xl m-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                    <div class="mx-auto p-4 h-screen flex justify-center">
                                        <div class="flex flex-wrap">
                                            <div class="w-full px-2">
                                                <div class="bg-gray-900 text-white relative min-w-0 break-words rounded-lg overflow-hidden shadow-sm mb-4 w-full bg-white dark:bg-gray-600">
                                                    <div class="px-6 py-6 relative">
                                                        <div class="flex mb-4 justify-between items-center">
                                                            <div>
                                                                <h5 class="mb-0 font-medium text-xl">{{ $currentForecast['name'] }}</h5>
                                                                <h6 class="mb-0">April 04 2021</h6><small>Cloudy</small>
                                                            </div>
                                                            <div class="text-right">
                                                                <h3 class="font-bold text-4xl mb-0"><span>{{ round($currentForecast['main']['temp']) }}°</span></h3>
                                                            </div>
                                                        </div>
                                                        <div class="block sm:flex justify-between items-center flex-wrap">
                                                            <div class="w-full sm:w-1/2">
                                                                <div class="flex mb-2 justify-between items-center"><span>Temp</span><small class="px-2 inline-block">39.11&nbsp;°</small></div>
                                                            </div>
                                                            <div class="w-full sm:w-1/2">
                                                                <div class="flex mb-2 justify-between items-center"><span>Feels like</span><small class="px-2 inline-block">33.33&nbsp;°</small></div>
                                                            </div>
                                                            <div class="w-full sm:w-1/2">
                                                                <div class="flex mb-2 justify-between items-center"><span>Temp min</span><small class="px-2 inline-block">24.9&nbsp;°</small></div>
                                                            </div>
                                                            <div class="w-full sm:w-1/2">
                                                                <div class="flex mb-2 justify-between items-center"><span>Temp max</span><small class="px-2 inline-block">39&nbsp;°</small></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="divider table mx-2 text-center bg-transparent whitespace-nowrap"><span class="inline-block px-3"><small>Forecast</small></span></div>
                                                    <div class="px-6 py-6 relative">
                                                        <div class="text-center justify-between items-center flex" style="flex-flow: initial;">
                                                            <div class="text-center mb-0 flex items-center justify-center flex-col"><span class="block my-1">Sun</span><img src="https://i.imgur.com/ffgW9JQ.png" class="block w-8 h-8"><span class="block my-1">38.3°</span></div>
                                                            <div class="text-center mb-0 flex items-center justify-center flex-col"><span class="block my-1">Mon</span><img src="https://i.imgur.com/BQbzoKt.png" class="block w-8 h-8"><span class="block my-1">39.9°</span></div>
                                                            <div class="text-center mb-0 flex items-center justify-center flex-col"><span class="block my-1">Mon</span><img src="https://i.imgur.com/BQbzoKt.png" class="block w-8 h-8"><span class="block my-1">40.1°</span></div>
                                                            <div class="text-center mb-0 flex items-center justify-center flex-col"><span class="block my-1">Mon</span><img src="https://i.imgur.com/ffgW9JQ.png" class="block w-8 h-8"><span class="block my-1">41.5°</span></div>
                                                            <div class="text-center mb-0 flex items-center justify-center flex-col"><span class="block my-1">Mon</span><img src="https://i.imgur.com/ffgW9JQ.png" class="block w-8 h-8"><span class="block my-1">40.1°</span></div>
                                                            <div class="text-center mb-0 flex items-center justify-center flex-col"><span class="block my-1">Mon</span><img src="https://i.imgur.com/BQbzoKt.png" class="block w-8 h-8"><span class="block my-1">38°</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="current_weather_info">
                                        <div class="">
                                            <h1>{{ $currentForecast['name'] }}</h1>
                                        </div>

                                    </div>
                                </div>

<!--                                <v-form></v-form>-->
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <h2>

                                        </h2>
                                    </div>
                                <h1>{{ round($currentForecast['main']['temp']) }}°</h1>
                                <p>{{$currentForecast['weather'][0]['description']}}</p>
                                <table>
                                    <tr>
                                        @foreach($weeklyForecast as $weather )
                                            <td>
                                                <p class="text-gray-400">{{(strtoupper(\Carbon\Carbon::createFromTimestamp($weather['dt'])->format('D')))}}</p>
                                                <button class="pinit_button">Show weather</button>
                                            </td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach($weeklyForecast as $weather )
                                            <td>
                                                <div id="pinit_menu">{{$weather['weather'][0]['description']}} src: <span id="src"></div>
                                            </td>
                                        @endforeach
                                    </tr>
                                </table>
                                <a href="{{ route('home') }}" style="display:block; text-align: center; padding: 10px; border-radius: 5px; width: 20%; margin: 30px auto; color: white; background-color: #1a202c; text-decoration: none;">
                                    Back
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
