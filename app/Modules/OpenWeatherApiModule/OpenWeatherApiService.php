<?php


namespace App\Modules\OpenWeatherApiModule;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class OpenWeatherApiService
{
    public function currentForecast() {

        $apiKey = $this->apiKey();
        $baseUrl = 'https://api.openweathermap.org/data/2.5/weather?q=';
        $location = Auth::user()->location;
        $response = Http::get("{$baseUrl}{$location}&appid={$apiKey}&units=metrics");
        return $response->json();

    }

    public function weeklyForecast() {

        $apiKey = $this->apiKey();
        $currentForecast = $this->currentForecast();
        $longitude = $currentForecast['coord']['lon'];
        $latitude = $latitude = $currentForecast['coord']['lat'];
        $fullUrl = Http::get("https://api.openweathermap.org/data/2.5/onecall?lat={$latitude}&lon={$longitude}&appid={$apiKey}&units=metrics");

        return $fullUrl->json();
    }

    public function apiKey() {
        return $apiKey = config('services.openweather.api_key');
    }

}
