<?php

/**
 * Fonction retournant la variable de session indiquant si l'utilisateur est connecté
 * @return bool true si l'utilisateur est connecté, false sinon
 */
function checkConnected() {
    return $_SESSION['isConnected'];
}

/**
 * Fonction permettant de détruire la session et de retourner sur la page de login
 */
function logout() {
    session_destroy();
    require 'view/login.php';
}

/**
 * Fonction permettant de récupérer la liste des utilisateurs afin de les afficher dans la vue users.php accessible par
 * les administrateurs
 * @throws Exception dans le cas où un collaborateur essaie d'accéder à cette vue
 */
function administration() {
    // si l'utilisateur n'est pas un administrateur
    if($_SESSION['role'] != ROLE_ADMIN){
        throw new Exception('You do not have the rights to access this page');
    }

    // récupération des utilisateurs dans la DB afin qu'ils soient affichés dans la vue grâce à la variable $users
    $users = getAllUsers()->fetchAll();
    require 'view/users.php';
}

/**
 * Fonction permettant de modifier les informations d'utilisateur existant
 * @throws Exception dans le cas où un collaborateur essaie d'accéder à cette vue
 */
function changeUserDetails() {

    // récupération du numéro unique de l'utilisateur
    $userNo = $_GET['no'];

    // si l'utilisateur n'est pas admin et qu'il essaie de modifier un autre utilisateur que lui-même
    if($_SESSION['role'] != ROLE_ADMIN && $userNo != $_SESSION['no']){
        throw new Exception('You do not have the rights to modify this user');
    }


    if (empty($_POST)){
        // récupération des informations de l'utilisateur
        $user = getUserByID($userNo)->fetch();

        // si ce n'est pas null alors l'utilisateur existe déjà et c'est donc une modification
        if($user != null) {
            $isCreation = false;
            require 'view/usermodify.php';
        }
        else { // sinon l'utilisateur n'existe pas
            $_SESSION['message'] = "This user does not exist";
            administration();
        }
    }

    // si l'on veut définir un nouveau mot de passe
    if(isset($_POST['password']) && $_POST['password'] != ""){
        // appel de la fonction permettant de faire la modification dans la DB
        updatePassword($userNo, $_POST['password']);

        // redirection de l'utilisateur sur la page de login une fois la modification effectuée
        if($userNo == $_SESSION['no']){
            $_SESSION['message'] = "Your password has been updated. Please log in again";
            logout();
            exit();
        }
    }

    // si l'utilisateur est admin et qu'il veut modifier les infos d'un utilisateur
    if($_SESSION['role'] == ROLE_ADMIN && isset($_POST['role'])){

        // appel de la fonction permettant de mettre à jour les données dans la DB
        updateUserNonEmptyFields($userNo);
        $_SESSION['message'] = "The account has been modified";
        administration();
    }
}

/**
 * Fonction permettant de créer un nouvel utilisateur
 * @throws Exception dans le cas où un collaborateur essaie d'accéder à cette vue
 */
function addUser(){

    // si l'utilisateur n'est pas un administrateur
    if($_SESSION['role'] != ROLE_ADMIN){
        throw new Exception('You do not have the rights to access this page');
    }

    // si ce n'est pas null alors l'utilisateur existe déjà et c'est donc une modification
    if (empty($_POST)) {
        $isCreation = true;
        require 'view/usermodify.php';
    }
    else {
        try {
            $validity = isset($_POST['valid']) ? "1 " : "0 ";
            // appel de la fonction permettant de créer le nouvel utilisateur dans la DB
            insertUser($_POST['username'], $_POST["password"], $validity, $_POST["role"]);
            $_SESSION['message'] = "The account has been created";

        } catch(Exception $e){
            $_SESSION['message'] = "The account couldn't be created";
        }
        administration();
    }
}

/**
 * Fonction permettant de supprimer un utilisateur
 * @throws Exception
 */
function deleteUser(){

    // si l'utilisateur n'est pas un administrateur
    if($_SESSION['role'] != ROLE_ADMIN ){
        throw new Exception('You do not have the rights to access this page');
    }

    $userNo = $_GET['no'];

    // vérifie que l'utilisateur existe
    $user = getUserByID($userNo)->fetch();
    if($user != null) {

        // si l'utilsateur à supprimer est différent de celui connecté actuellement
        if($userNo != $_SESSION['no']){
            // appel de la fonction supprimant l'utilisateur de la DB
            dropUser($userNo);
        }
        else {
            $_SESSION['message'] = "You cannot delete yourself";
        }
    }
    else {
        $_SESSION['message'] = "This user does not exist";
    }
    administration();
}
?>