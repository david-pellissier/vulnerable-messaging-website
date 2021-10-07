<?php

    function new_msg(){

        if (isset($_POST['recipient']) && isset($_POST['subject']) && isset($_POST['body'])) {

            $resultats = getUserByLogin($_POST['recipient']);
            $resultats = $resultats->fetch();
            if (empty($resultats['username'])) {
                throw new Exception("Les données d'authentification sont incorrectes");
            }
            else {
                $date = date("Y-m-d");
                sendMail($_SESSION['no'], $resultats['no'], $_POST['subject'], $_POST['body'], $date);
                mailbox();
            }
        }
        else {

            if (isset($_GET['reply'])) {
                $mail = getMailDetails($_GET['reply'])->fetch();
            }
            require 'view/message.php';
        }
    }

?>