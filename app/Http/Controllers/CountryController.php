<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
 
class CountryController extends Controller
{
    public function view()
    {
        return view('Country.list',['countries'=>Country::get()]);
    }

    public function getTime()
    {
        $timezone = request('timezone') ?? '';
        $response = Http::get("https://timeapi.io/api/Time/current/zone?timeZone=$timezone");
        $current_time = date('h:i:s A', strtotime($response['dateTime']));
        return array('status'=>'success', 'time' =>$current_time);
        // http://worldtimeapi.org/api/timezone/Asia/Kolkata
    }
}
