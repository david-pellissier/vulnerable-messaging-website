<?php

    function sendMail($noSender, $noRecipient, $subject, $body, $date) {

        $db = connect();
        // Création de la string pour la requête
        $request = "INSERT INTO Message (noSender, noRecipient, subject, body, date) VALUES (:noSender, :noRecipient, :subject, :body, :date)";
        $query = $db->prepare($request);
        $query->bindValue(':noSender', $noSender);
        $query->bindValue(':noRecipient', $noRecipient);
        $query->bindValue(':subject', $subject);
        $query->bindValue(':body', $body);
        $query->bindValue(':date', $date);

        // Exécution de la requete
        return $query->execute();
    }
?>