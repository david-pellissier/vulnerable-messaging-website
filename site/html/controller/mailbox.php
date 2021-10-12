<?php

/**
 * Fonction permettant de récupérer tous les mails d'un utilisateur afin de les afficher dans la maibox
 */
function mailbox(){
    // appel à la fonction getUserMails du model pour récupérer les mails, la variable $mails sera ensuite utilisée dans
    // la vue mailbox.php pour afficher les infos des mails
    $mails = getUserMails($_SESSION['no'])->fetchAll();
    require('view/mailbox.php');
}

/**
 * Fonction permettant de supprimer un mail en fonction de son numéro reçu par un paramètre GET
 */
function deleteMail(){
    // appel à la fonction présente dans le model
    delMail($_GET['no']);
    mailbox();
}
?>