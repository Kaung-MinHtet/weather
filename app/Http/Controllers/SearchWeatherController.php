<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchWeatherController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'city' => [
                'required', 
                'string', 
                'regex:/^[a-zA-Z\s\-]+$/'
            ],
        ]);
        
        try {
            $response = Http::get('http://api.openweathermap.org/geo/1.0/direct', [
                'q' => $request->city,
                'appid' => env('WEATHER_API_KEY'),
                'limit' => '5',
            ]);
    
            if($response->successful()) {
                if(!isset($response[0])) {
                    return redirect()->back()->withErrors(['city' => 'City not found'])->withInput();
                }
                // return $response->json();

                $lat = $response[0]['lat'];
                $lon = $response[0]['lon'];
            
                // return response()->json([
                //     'lat' => $lat,
                //     'lon' => $lon,
                // ]);
            
                $weather_response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                    'lat' => $lat,
                    'lon' => $lon,
                    'units' => 'Metric',
                    'appid' => env('WEATHER_API_KEY'),
                ]);
            
                // return $weather_response->json();
                $temperature = $weather_response['main']['temp'] . " °C";
                $weather = $weather_response['weather'][0]['main'];
                $wind_speed = $weather_response['wind']['speed'] . ' m/s';
                $humidity = $weather_response['main']['humidity'] . " %";
                $pressure = $weather_response['main']['pressure'] . " hPa";
                $visibility = $weather_response['visibility'] . " km";
                $icon = $weather_response['weather'][0]['icon'];
                $city = $weather_response['name'];
                $date = Carbon::parse($weather_response['dt'])->format('Y-m-d H:i:s');
            
                return view('result', compact('city', 'weather', 'temperature', 'wind_speed', 'humidity', 'pressure', 'visibility', 'icon', 'date'));   
            } else {
                return redirect()->back()->withErrors(['city' => 'Failed to retrieve data.'])->withInput();
            }
        } catch (RequestException $e) {
            // Handle the cURL error or timeout error
            if ($e->getCode() == 28) {
                return back()->withErrors(['city' => 'Request timed out while connecting to the weather service. Please try again later.'])->withInput();
            }

            // Handle any other exceptions
            return back()->withErrors(['city' => 'An error occurred. Please try again later.'])->withInput();
        }
        
    }
}
