<?php

function mailbox(){
    $mails = getUserMails($_SESSION['no'])->fetchAll();
    require('view/mailbox.php');
}


function deleteMail(){
    delMail($_GET['no']);
    mailbox();
}
?>