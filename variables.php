<?php

include 'password.php';

$server="https://creps-toulouse.requea.com";

$access_token= $username. ":".$password;

// data type for SearchResaByDate
/* $data='{
    "rqFromDate": "2022-08-02T18:23:11.890Z",
    "rqToDate": "2022-08-06T18:23:11.890Z",
    "rqLocation": "string",
    "rqClass": "string",
    "rqRoomNumber": "string",
    "rqRoomId": "string",
    "rqRoomResaId": "string",
    "rqBeneficiary": "string",
    "rqResourceId": "string",
    "rqResourceResaId": "string"
  }';
*/  


  // prise en compte des evénements dans la journée
$date_debut=date('Y-m-d')."T00:00:00.000Z";
$date_fin=date('Y-m-d')."T23:59:99.999Z";
//$date_debut="2022-08-17T00:00:00.000Z";
//$date_fin="2022-09-18T23:59:99.999Z";

$data='{
    "rqFromDate": "'.$date_debut.'",
    "rqToDate": "'.$date_fin.'",
}';