<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feeling;

class FeelingController extends Controller
{
    function create(Request $request){
        $feeling = new Feeling();
        $feeling->content = $request->content;
        $feeling->room_id = $request->room_id;
        $feeling->save();
        
        return redirect()->route('geo.room', ['id' => $feeling->room_id]);
    }
    
    function create_($id, $content){
        $feeling = new Feeling();
        $feeling->content = $content;
        $feeling->room_id = $id;
        $feeling->save();
        
        return \Response::json(['success' => true]);
    }
}
