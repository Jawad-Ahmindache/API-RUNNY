<?php

// Génerer une réponse JSON
// Message : "Exemple de message"; Type = error ou success; data : tableau de données à envoyer
function courseJSONResponse(string $message,string $responseType,array $data = array()){

    if($responseType != "error" && $responseType != "success")
         die("Le type de réponse doit être success ou error");
         
    $response = array(
        'type' => $responseType,
        'message' => $message,
        'data' => $data,
    );

    return json_encode($response);
}

function getTimeByDT($dateTime){
    $date = new DateTime($dateTime);
    
    return $date->format("H:i:s");
}


function hours2Decimal($time)
{
    $hms = explode(":", $time);
    $hms[0] = $hms[0] * 3600;
    $hms[1] = $hms[1] * 60;
    return (float) ($hms[0] + $hms[1] + $hms[2]);
}

function decimal2Hours($time){

    return gmdate("G:i:s", $time);

}
function getTimeCropped($time){
    $hms = explode(":", $time);

    if((int)$hms[0] > 0)
        return $hms[0]."H";

    else if((int)$hms[1] > 0)    
        return $hms[1]."M";

    else
        return $hms[2]."S";
    
}
