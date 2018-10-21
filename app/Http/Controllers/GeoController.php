<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class GeoController extends Controller
{
    function findRooms($lat, $long) {
        $rooms = Room::all()->take(1);
        $roomsAvailable = [];
        for($i=0; $i<count($rooms); $i++){
            //calc distances
            // $client = new \GuzzleHttp\Client(['base_uri' => 'https://010pixel-distance-v1.p.mashape.com']);
            // $response = $client->request('GET', '/', [
            //     'query' => [
            //         'lat1' => $rooms[$i]->latitude,
            //         'long1' => $rooms[$i]->longtitude,
            //         'lat2' => $lat,
            //         'long2' => $long
            //     ],
            //     'headers' => [
            //         'X-Mashape-Key' => 'ZWftNkLrYQmshlJ3mH7cRKCpf81sp1bHTOQjsnvAgdv31OIxdd',
            //         'X-Mashape-Host' => '010pixel-distance-v1.p.mashape.com'
            //     ]
            // ]);
            // $data = json_decode($response->getBody());
            
            // echo($lat);
            // echo(",");
            // echo($long);
            // echo("|[room]");
            // echo($rooms[$i]->latitude);
            // echo("|");
            // echo($rooms[$i]->longtitude);
            // echo("---");
            // echo($data->value);
            // echo($data->unit);
            // echo(", ");
        }
        // $client = new \GuzzleHttp\Client(['base_uri' => 'https://010pixel-distance-v1.p.mashape.com']);
        // $response = $client->request('GET', '/', ['query' => ['lat1' => '10','long1' => '147','lat2' => '180','long2' => '0'],'headers' => ['X-Mashape-Key' => 'ZWftNkLrYQmshlJ3mH7cRKCpf81sp1bHTOQjsnvAgdv31OIxdd', 'X-Mashape-Host' => '010pixel-distance-v1.p.mashape.com']]);
        // $body = $response->getBody();
        // echo $body;
    }
    
    function room($id) {
        $room = Room::find($id);
        $feelings = $room->feelings;
        return view('room',[
            'room' => $room,
            'feelings' => $feelings
        ]);
    }
}
