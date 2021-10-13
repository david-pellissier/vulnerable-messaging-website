<?php
/**
 * Fonction permettant d'écrire un nouveau mail dans la DB
 * @param $noSender    numéro unique de l'expéditeur
 * @param $noRecipient numéro unique du destinataire
 * @param $subject     sujet du mail
 * @param $body        corps du mail
 * @param $date        date du mail
 * @return bool        true si le mail a bien été écrit dans la DB, false sinon
 */
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

    // exécution de la requête
    return $query->execute();
}
?>