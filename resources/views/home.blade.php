@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   @if(Auth::user()->is_admin)
                            <p>This is an admin account</p>
                        @else
                            <p>this is a normal account</p>
                        @endif
                        <div class="">
                            <div class="card">
                                <form action="{{url('search')}}" method="post" class="form-group">
                                    @csrf
                                    <input type="text" name="location" class="form-control">
                                    <button type="submit">Search</button>
                                </form>

                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <h2>
                                        {{ $currentForecast['name'] }}
                                    </h2>
                                </div>
                                <h1>{{ round($currentForecast['main']['temp']) }}°</h1>
                                <p>{{$currentForecast['weather'][0]['description']}}</p>
                                <table>
                                    <tr>
                                        @foreach($weeklyForecast as $weather )
                                            <td>
                                                <div class="text-gray-400">{{(strtoupper(\Carbon\Carbon::createFromTimestamp($weather['dt'])->format('D')))}}</div>
                                            </td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach($weeklyForecast as $weather )
                                            <td>
                                                <div class="text-gray-400">{{$weather['weather'][0]['description']}}</div>
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
