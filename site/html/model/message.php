<?php

    function sendMail($noSender, $noRecipient, $subject, $body, $date) {

        $db = connect();
        // Création de la string pour la requête
        $requete = "INSERT INTO Message (noSender, noRecipient, subject, body, date) 
            VALUES ('" . $noSender . "', '" . $noRecipient . "', '" . $subject . "', '" . $body . "', '" . $date . "')";
        // Exécution de la requete
        return $db->query($requete);
    }
?>