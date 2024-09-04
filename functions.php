<?php
function cURLGet($server, $access_token, $calltype,$data)
{
    $ch = curl_init($server . $calltype);
    curl_setopt_array($ch, array(
        CURLOPT_HTTPGET => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_USERPWD => $access_token,
        CURLOPT_HTTPHEADER => array(
            'accept:application/json',
            'Content-Type:application/json' // "Content-Type:application/json", et non pas "Content-Type: application/json"
        ),
        CURLOPT_POSTFIELDS => $data,
    ));
    $response = curl_exec($ch);
    if ($response === false) {
        return (curl_error($ch));
    }
    $responseData = json_decode($response, true);
    return $responseData;
}


function group_location($array)
    // grouper les évènements par "location"
{
    $result=[];
    $location_array=[];
    $loc="";
    $indextest= 0;

    foreach ($array as $element)
    {
        $event=$element["rqTitle"];


        if (!isset(${"index_event_$event"})){
            // initialisation d'un compteur pour un meme évènement
            ${"index_event_$event"}=0;
        }

            // si la loc est dans l'array "location" on  ajoute le nouvel évent a la loc en cours 
        if (in_array($element["rqLocation"], $location_array))
        {
            $loc=$element["rqLocation"];
            ${"index_location_$loc"}+=1;
            
            $result[$element["rqLocation"]][${"index_location_$loc"}] = array(
                "rqTitle"=> $element["rqTitle"]?? Null,
                "rqStartTime"=> $element["rqStartTime"]?? Null, 
                "rqEndTime"=> $element["rqEndTime"]?? Null,
                "rqRoom"=> $element["rqRoom"]?? "Non définie"
            );

        }
        else
        {
        // autrement mis à jour de l'array location avec la nouvelle loc, et création de l'index (pour les salles dans la meme loc)
            $location_array[]=$element["rqLocation"];
            $loc=$element["rqLocation"];
            ${"index_location_$loc"}=0;

            $result[$element["rqLocation"]][${"index_location_$loc"}] = array(
                "rqTitle"=> $element["rqTitle"]?? Null,
                "rqStartTime"=> $element["rqStartTime"]?? Null, 
                "rqEndTime"=> $element["rqEndTime"]?? Null,
                "rqRoom"=> $element["rqRoom"]?? "Non définie"
            );
        }

    }

    return $result;
}

