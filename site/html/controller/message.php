<?php

    function new_msg(){

        if (isset($_POST['recipient']) && isset($_POST['subject']) && isset($_POST['body'])) {

            $resultats = getUserByLogin($_POST['recipient']);
            $resultats = $resultats->fetch();
            if (empty($resultats['username'])) {
                $_SESSION['message'] = "The user does not exist";
                require 'view/message.php';
            }
            else {
                $date = date("Y-m-d H:i:s");
                sendMail($_SESSION['no'], $resultats['no'], $_POST['subject'], $_POST['body'], $date);
                $_SESSION['message'] = "The message has been sent";
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