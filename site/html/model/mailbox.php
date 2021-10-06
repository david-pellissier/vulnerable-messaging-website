<?php

 function getUserMails($user) {
     $db = connect();
     // Création de la string pour la requête
     $requete = "SELECT Message.no, date,User.username as 'sender', subject, body
                FROM Message
                INNER JOIN User
                ON Message.noSender = User.no
                WHERE noRecipient ='" . $user . "'
                ORDER BY date desc";
     // Exécution de la requete
     return $db->query($requete);
 }

 function delMail($no){

 }


?>