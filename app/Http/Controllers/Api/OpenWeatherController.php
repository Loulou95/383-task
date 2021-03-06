<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\OpenWeatherApiModule\OpenWeatherApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OpenWeatherController extends Controller
{

    private $openWeatherApiService;

    public function __construct() {
        $this->openWeatherApiService = new OpenWeatherApiService();
    }

    public function index(Request $request) {

        $currentForecast = $this->openWeatherApiService->currentForecast();
        $weeklyForecast = $this->openWeatherApiService->weeklyForecast();
        $searchString = $request->searchString;

        if($searchString) {
            try {
                $searchForecast = $this->openWeatherApiService->searchByLocation($request);
                $currentForecast = $searchForecast[0]['currentForecast'];
                $weeklyForecast = $searchForecast[0]['weeklyForecast'];
            }catch (\Exception $e) {
                return $e->getMessage();
            }
        }

        return view('/welcome', [
            'currentForecast' => $currentForecast,
            'weeklyForecast' => $weeklyForecast,
            'searchString' => $searchString
        ]);
    }
}
