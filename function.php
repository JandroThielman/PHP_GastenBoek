<?php

    include "connect.php";

    if (isset($_POST['opslaan'])) {
    
        $naam = filter_input(INPUT_POST, "naam", FILTER_SANITIZE_STRING);
        $bericht = filter_input(INPUT_POST, "bericht", FILTER_SANITIZE_STRING);

        $query = $db->prepare("INSERT INTO berichten (id, naam, bericht, datumtijd) VALUES (NULL, :naam, :bericht, current_timestamp());");
        $query->bindParam(':naam', $naam);
        $query->bindParam(':bericht', $bericht);

        $query->execute();
    }

    if( !empty($_POST) ){
        header("location: home.php\n");
        exit;
      }

?>