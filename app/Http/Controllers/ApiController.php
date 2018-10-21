<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class ApiController extends Controller
{
    function getRoomData($id){
        $room = Room::find($id);
        $room->feelings;
        
        return \Response::json(['room' => $room]);
    }
}
