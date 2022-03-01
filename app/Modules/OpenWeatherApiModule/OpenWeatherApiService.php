<?php


namespace App\Modules\OpenWeatherApiModule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class OpenWeatherApiService
{
    protected $apiKey;


    public function __construct() {
        $this->apiKey = config('services.openweather.api_key');
    }

    public function currentForecast() {

        $apiKey = $this->apiKey;
        $baseUrl = 'https://api.openweathermap.org/data/2.5/weather?q=';
        $location = Auth::user()->location;
        try {
            $response = Http::get("{$baseUrl}{$location}&appid={$apiKey}&units=metrics");
        }catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->json();

    }

    public function weeklyForecast() {

        $apiKey = $this->apiKey;
        $currentForecast = $this->currentForecast();
        $longitude = $currentForecast['coord']['lon'];
        $latitude = $latitude = $currentForecast['coord']['lat'];
        $fullUrl = Http::get("https://api.openweathermap.org/data/2.5/onecall?lat={$latitude}&lon={$longitude}&appid={$apiKey}&units=metrics");
        $fullUrl = $fullUrl['daily'];
        return $fullUrl;
    }

    public function searchByLocation($request) {
        $string = $request->searchString;
        $apiKey = $this->apiKey;
        $location = Auth::user()->location;

        if($string) {
            $location = $string;
        }
        $baseUrl = 'https://api.openweathermap.org/data/2.5/weather?q=';
        $response = Http::get("{$baseUrl}{$location}&appid={$apiKey}&units=metrics");

        return $response->json();
    }
}
