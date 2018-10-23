<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class GeoController extends Controller
{
    function room($id) {
        $room = Room::find($id);
        $feelings = $room->feelings;
        return view('room',[
            'room' => $room,
            'feelings' => $feelings
        ]);
    }
}
