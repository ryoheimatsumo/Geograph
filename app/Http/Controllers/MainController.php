<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use App\Feeling;
use App\Libraries\Config;

class MainController extends Controller
{
    function index(){
        return view('index');
    }
    
    function world(){
        $feelings = Feeling::all();
        
        // prep http request body
        $jBody = (object)["documents" => []];
        foreach($feelings as $k => $f){
            if($k >= Config::TXT_ANALYSIS_BODY_COLLECTIONS_MAX) break;
            
            array_push(
                $jBody->documents, 
                (object)[
                    "languages" => "en",
                    "id" => $k+1,
                    "text" => $f->content
                ]
            );
        }
        
        // request
        $client = new Client();
        $response = $client->post('https://japaneast.api.cognitive.microsoft.com/text/analytics/v2.0/sentiment', [
            'headers' => [
                'Ocp-Apim-Subscription-Key' => env('TA_API_KEY'),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'body' => json_encode($jBody),
        ]);
        
        // get score set
        $scores = json_decode((string)$response->getBody())->documents;
        
        // get average score
        $avgScore = 0;
        foreach($scores as $s){
            $avgScore += $s->score;
        }
        $avgScore = round(($avgScore/count($scores)) * 100);
        
        return view('world', [
            'avgScore' => $avgScore,
            'emoji' => Config::EMOJIS[(int)($avgScore*0.1)],
            'jFeelings' => $feelings
        ]);
    }
}
