<?php
    // Le rôle d'administrateur est défini par un 1 dans la DB alors que le rôle de collaborateur est défini par un 0
    const ROLE_USER = '0';
    const ROLE_ADMIN = '1';
    
    require 'controller/details.php';
    require 'controller/mailbox.php';
    require 'controller/message.php';
    require 'controller/users.php';
    require 'controller/login.php';

    require 'model/details.php';
    require 'model/mailbox.php';
    require 'model/message.php';
    require 'model/users.php';
    require 'model/login.php';
    require 'model/db.php';

/**
 * Fonction permettant de rediriger l'utilisateur sur la mailbox s'il est connecté ou sur la page de login si ce n'est
 * pas le cas
 */
function home() {
    if(checkConnected()) {
            mailbox();
    }
    else {
        login();
    }
}
?>