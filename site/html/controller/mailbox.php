<?php

function mailbox(){
    $mails = getUserMails($_SESSION['no'])->fetchAll();

    require('view/mailbox.php');
}


function deleteMail(){
    // récupérer l'id à supprimer

    // appeler
    echo $_GET['no'];
}
?>