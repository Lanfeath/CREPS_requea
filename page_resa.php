<?php
    include_once "./functions.php";
    include_once "./variables.php";

  //  error_reporting(0);

  // Message d'erreur à sauvegardez
  // $errorMessage =  "\n" . date('d.m.Y h:i:s') . "error value: " . $error; 
  // Enregistrement du message d'erreur dans le fichier log
 // error_log($errorMessage, 3,"./errors.log"); 
  
    $response= cURLGet($server,$access_token,"/rest/rqWsCalendarEvent/SearchResaByDate",$data);

    $grouped_response = group_location($response);

?>
<!DOCTYPE html>
<html lang="fr">    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Custom styles for this template -->
        <link href="./style.css" rel="stylesheet">
        <title>Programme journalier</title>
    </head>
    <body>
        <header>
            <img src="ministere_sport.png" alt="Logo ministère des sports" class="align-left">
            <img src="creps_toulouse.png" alt="CREPS Toulouse">
            <img src="region_occitanie.png" alt="Logo région occitanie" class="align-right">
        </header>

        <content>
            <h1>Aujourd'hui au CREPS de Toulouse</h1>
            <?php
                // recuperation du nom de la location dans une variable locations_name
                $locations_name=array_keys($grouped_response);
                $index=0;
                
                //pour chaque location on crèe un nouveau tableau avec en titre H2 la location concernée
                foreach($grouped_response as $rq)
                {
                    echo '
                        <h2>Location: '. substr($locations_name[$index],1,strlen($locations_name[$index])-2).' </h2>';

            ?>
                <table class="sturdy">
                    <tr>
                        <th class="row-1 row-starttime">rqStartTime</th>
                        <th class="row-2 row-endtime">rqEndTime</th>
                        <th class="row-3 row-title">rqTitle</th>
                        <th class="row-4 row-status">Status</th>
                        <th class="row-5 row-room">rqRoom</th>
                    </tr>
            <?php
                    $index2=0;
                    foreach ($rq as $entry)
                    {
                            // a mettre en place fusion des lignes: rowspan
                        if ($index===100)
                        {
                            // voir ligne statut a modifier (69)
                            echo '
                                <tr>
                                <td rowspan="2">'. substr($entry["rqStartTime"],0,20).'</td>
                                <td rowspan="2">'. substr($entry["rqEndTime"],0,20).'</td>
                                <td rowspan="2">'. $entry["rqTitle"].'</td>
                                <td rowspan="2">Status</td>
                                <td>'. $entry["rqRoom"].'</td>
                                </tr>'; 

                        }
                        else
                        {
                            if($index2===10)
                            {
                                echo '
                                    <tr>
                                    <td>'. $entry["rqRoom"].'</td>
                                    </tr>'; 
                             
                            }
                            else // pour la fusion des lignes 
                            {
                                echo '
                                <tr>
                                <td>'. substr($entry["rqStartTime"],0,20).'</td>
                                <td>'. substr($entry["rqEndTime"],0,20).'</td>
                                <td>'. $entry["rqTitle"].'</td>
                                <td>Status</td>
                                <td>'. $entry["rqRoom"].'</td>
                                </tr>'; 
                            }
                            $index2=0;
                        }
                        if ($index===1){
                            $index2=1;
                        }
                    }

                    //on augmente de 1 l'index pour fusion des lignes (en cours)
                    $index = $index+1;
                    echo "</table>";


                }
            ?>

            
        </content>

        <footer>
            <p>Programme journalier du CREPS de Toulouse</p>
        </footer>
    </body>
</html>