<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    function showForm() {
        return view('newform');
    }
    
    function create(Request $request){
        $room = new Room();
        $room->title = $request->title;
        $room->descroption = $request->description;
        $room->latitude = $request->latitude;
        $room->longtitude = $request->longtitude;
        $room->save();
        
        return redirect()->route('geo.room', ['id' => $room->id]);
    }
}
