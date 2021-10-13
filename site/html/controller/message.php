<?php
/**
 * Fonction permettant d'écrire un nouveau message
 */
function new_msg(){

    // si les variables POST sont définies
    if (isset($_POST['recipient']) && isset($_POST['subject']) && isset($_POST['body'])) {

        // récupération du destinataire
        $results = getUserByLogin($_POST['recipient']);
        $results = $results->fetch();

        // si le résultat de la fonction getUserByLogin est vide, alors le destinataire n'existe pas
        if (empty($results['username'])) {
            $_SESSION['message'] = "The user does not exist";
            require 'view/message.php';
        }
        else {
            // la date est utilisée dans ce format pour que les mails soient triés correctement dans la mailbox, même
            // avec des mails arrivés le même jour, cependant elle sera tronquée dans la vue pour n'afficher que la date
            // sans l'heure
            $date = date("Y-m-d H:i:s");
            // appel de la fonction qui permet d'inscrire le mail dans la DB
            sendMail($_SESSION['no'], $results['no'], $_POST['subject'], $_POST['body'], $date);
            $_SESSION['message'] = "The message has been sent";
            mailbox();
        }
    }
    else {

        // si l'utilisateur répond à un mail, on récupère les infos de celui-ci afin de pouvoir les afficher dans la vue
        // message.php grâce à la variable $mail
        if (isset($_GET['reply'])) {
            $mail = getMailDetails($_GET['reply'])->fetch();
        }
        require 'view/message.php';
    }
}
?>