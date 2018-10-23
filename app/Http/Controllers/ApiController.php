<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Libraries\Haversine;
use App\Libraries\Config;

class ApiController extends Controller
{
    function getRoomData($id){
        $room = Room::find($id);
        $room->feelings;
        
        return \Response::json(['room' => $room]);
    }
    
    function findRooms($lat, $long) {
        $rooms = Room::all();
        $roomsAvailable = [];
        $roomLength = count($rooms);
        foreach($rooms as $r){
            $dist = Haversine::distanceInMeters($lat, $long, $r->latitude, $r->longtitude);
            if($dist < Config::RANGES[0]){
                $r->distance = $dist;
                $r->user_latitude = $lat;
                $r->user_longtitude = $long;
                array_push($roomsAvailable, $r);
            }
        }
        
        return \Response::json($roomsAvailable);
    }
}
