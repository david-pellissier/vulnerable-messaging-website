<?php

function checkConnected()
{
    return $_SESSION['isConnected'];
}

function logout()
{
    session_destroy();
    require 'view/login.php';
}


function administration()
{
    if($_SESSION['role'] != ROLE_ADMIN ){
        throw new Exception('You do not have the rights to access this page');
    }

    $users = getAllUsers()->fetchAll();
    require 'view/users.php';
}


function changeUserDetails()
{
    $userNo = $_GET['no'];

    // vérifier qu'il est connecté avec le compte ou est admin
    if($_SESSION['role'] != ROLE_ADMIN && $userNo != $_SESSION['no']){
        throw new Exception('You do not have the rights to modify this user');
    }

    if (empty($_POST)){
        $user = getUserByID($userNo)->fetch();

        if($user != null ) {
            $isCreation = false;
            require 'view/usermodify.php';
        }
        else {
            $_SESSION['message']="This user does not exist";
            administration();
        }
    }

    // si nouveau mot de passe
    if(isset($_POST['password']) && $_POST['password'] != ""){
        updatePassword($userNo, $_POST['password']);
        if($userNo == $_SESSION['no']){
            $_SESSION['message'] ="Your password has been updated. Please log in again";
            logout();
            exit();
        }
    }

    // màj des infos si admin
    if($_SESSION['role'] == ROLE_ADMIN && isset($_POST['role'])){

        updateUserNonEmptyFields($userNo);
        $_SESSION['message'] = "The account has been modified";
        administration();
    }


}

function addUser(){

    if($_SESSION['role'] != ROLE_ADMIN ){
        throw new Exception('You do not have the rights to access this page');
    }

    if (empty($_POST)) {
        $isCreation = true;
        require 'view/usermodify.php';
    }
    else{
        try {
            $validity = isset($_POST['valid']) ? "1 " : "0 ";
            insertUser($_POST['username'], $_POST["password"], $validity, $_POST["role"]);
            $_SESSION['message'] = "The account has been created";

        } catch(Exception $e){
            $_SESSION['message'] = "The account couldn't be created";
        }
        administration();
    }

}

function deleteUser(){

    if($_SESSION['role'] != ROLE_ADMIN ){
        throw new Exception('You do not have the rights to access this page');
    }

    $userNo = $_GET['no'];

    // Vérifie si l'utilisateur existe
    $user = getUserByID($userNo)->fetch();
    if($user != null ) {

        if($userNo != $_SESSION['no']){
            dropUser($userNo);
        }
        else{
            $_SESSION['message'] = "You cannot delete yourself";
        }
    }
    else {
        $_SESSION['message'] ="This user does not exist";
    }
    administration();

}
