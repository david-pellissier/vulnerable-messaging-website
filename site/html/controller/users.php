<?php 

function checkConnected()
{
    return $_SESSION["isConnected"];
}

function logout()
{
    session_destroy();
    require 'view/login.php';
}


function administration()
{
    require 'view/users.php';
}


?>