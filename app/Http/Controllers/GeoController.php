<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeoController extends Controller
{
    function index() {
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://010pixel-distance-v1.p.mashape.com']);
        $response = $client->request('GET', '/', ['query' => ['lat1' => '10','long1' => '147','lat2' => '180','long2' => '0'],'headers' => ['X-Mashape-Key' => 'ZWftNkLrYQmshlJ3mH7cRKCpf81sp1bHTOQjsnvAgdv31OIxdd', 'X-Mashape-Host' => '010pixel-distance-v1.p.mashape.com']]);
        $body = $response->getBody();
        echo $body;
    }
}