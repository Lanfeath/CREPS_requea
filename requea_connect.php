<?php
include_once "./functions.php";
include_once "./variables.php";


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

  $data='{
    "rqFromDate": "2022-08-02T18:23:11.890Z",
    "rqToDate": "2022-08-03T18:23:11.890Z",
    "rqLocation": "/Amphitheatre/",
  }';

// echo "test du:" . date("Y/m/d/h/i") . "<br>";
$response= cURLGet($server,$access_token,"/rest/rqWsCalendarEvent/SearchResaByDate",$data);


foreach($response as $rq)
{
  echo "<br>";
  // location
  echo "rqLocation: ". $rq["rqLocation"]."<br>"; 
  // date
  echo "rqStartTime: ". $rq["rqStartTime"]; 
  echo " and rqEndTime: ". $rq["rqEndTime"] ."<br>"; 

  // lieux
  echo "rqRoom: ". $rq["rqRoom"]."<br>"; 

  // description
  echo "rqTitle: ". $rq["rqTitle"]."<br>"; 
}