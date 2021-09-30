<?php 

function checkConnected()
{
    return true;
}

function logout()
{
    require 'view/login.php';
}


function administration()
{
    require 'view/users.php';
}


?>