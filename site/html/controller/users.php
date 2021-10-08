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
    if($_SESSION['role'] != ROLE_ADMIN ){
        throw new Exception('You do not have the rights to access this page');
    }

    $users = getAllUsers()->fetchAll();
    require 'view/users.php';
}

/* MEMO "admin" = $2y$10$WYDCmKw0I4v727i9VhQbZODJE791WA8lZfcgty5VfqKqnBzTJRBmO */
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
            require 'view/usermodify.php';
        }
        else {
            throw new Exception("This user does not exist");
        }
    }

    // màj des infos si admin
    if($_SESSION['role'] == ROLE_ADMIN && isset($_POST['username'])){
        updateUserNonEmptyFields($userNo);
        $message = "The account has been modified";
        administration();
    }

    // si nouveau mot de passe
    if(isset($_POST['password']) && $_POST['password'] != ""){
        updatePassword($userNo, $_POST['password']);
        if($userNo == $_SESSION['no']){
            $message ="Your password has been updated. Please log in again";
            logout();
        }
    }
}

function addUser(){

    if($_SESSION['role'] != ROLE_ADMIN ){
        throw new Exception('You do not have the rights to access this page');
    }

    $username = "User " . rand(10000, 100000);
    insertUser($username, "default", "0", "0");
    $user = getUserByLogin($username)->fetch();
    header("location: index.php?action=update_user&no=" . $user['no']);
    exit();
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
            administration();
        }
        else{
            throw new Exception("You cannot delete yourself è-é");
        }
    }
    else {
        throw new Exception("This user does not exist");
    }

}

