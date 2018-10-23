<?php

namespace App\Libraries;

class Haversine{
    public static function distance($lat1, $long1, $lat2, $long2){
        $radius = 6371;
        $latOffset = $lat2 - $lat1;
        $latRad = Haversine::toRadians($latOffset);
        $longOffset = $long2 - $long1;
        $longRad = Haversine::toRadians($longOffset);
        $lat1Rad = Haversine::toRadians($lat1);
        $lat2Rad = Haversine::toRadians($lat2);
        
        $a = pow(sin($latRad/2), 2) + cos($lat1Rad) * cos($lat2Rad) * pow(sin($longRad/2), 2);
        $b = 2*atan2(sqrt($a), sqrt(1-$a));
        $dist = $radius * $b;
        
        return $dist;
    }
    
    public static function distanceInMeters($lat1, $long1, $lat2, $long2){
        return Haversine::distance($lat1, $long1, $lat2, $long2) * 1000;
    }
    
    private static function toRadians($val){
        return $val * pi() / 180;
    }
}