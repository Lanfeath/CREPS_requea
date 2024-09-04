<?php
include_once "./functions.php";
include_once "./variables.php";


/*
// Désactiver le rapport d'erreurs
error_reporting(0);

// Rapporte les erreurs d'exécution de script
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Rapporter les E_NOTICE peut vous aider à améliorer vos scripts
// (variables non initialisées, variables mal orthographiées..)
 error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Rapporte toutes les erreurs à part les E_NOTICE
// C'est la configuration par défaut de php.ini
$test=error_reporting(E_ALL ^ E_NOTICE);

// Repporte toutes les erreurs PHP (pour PHP 3, utilisez l'entier 63)
$test=error_reporting(E_ALL);





    $response= cURLGet($server,$access_token,"/rest/rqWsCalendarEvent/SearchResaByDate",$data);

    echo "<br> Essai groupe location <br>";

    var_dump(group_location($response));


$a = 'bonjour';
$bonjour = 'monde';

var_dump($a);
var_dump($bonjour);

var_dump($$a);

$name_monde= "it works";

// ${'index_location_'$locations["rqLocation"]}=0;
var_dump(${"name_$bonjour"});
*/

$array = array("1"=> "a", "2" => "b", "3" => array("ab"=> "cd"));
echo "test array <br>";
var_dump($array);


echo " <br> test array modifié <br>";
$array["1"]="test";
var_dump($array);

echo " <br> test array modifié 2 <br>";
$array["3"]["ab"]="test";
var_dump($array);

echo " <br> test array modifié 3 <br>";
$array["3"]["de"]="fg";
var_dump($array);