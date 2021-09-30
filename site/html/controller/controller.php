<?php 
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

    function home() {
        if(checkConnected()) {
            require 'view/mailbox.php';
        }
        else {
            require 'view/login.php';
        }        
    }
?>