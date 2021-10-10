<?php
/*
 * @brief  Contrôle de login
 * @return $infoUser. COntient les informations de base de l'utilisateur (email, id et login)
 * @param les informations passées en POST
 */
function checkLogin($postArray)
{
    $username = $postArray["fLogin"];
    $passwdPost = $postArray["fPasswd"];
    $resultats = getUserByLogin($username);
    $resultats = $resultats->fetch();
    if (empty($resultats['username'])) {
        $message = "The user does not exist or the password is incorrect";
        require 'view/login.php';
        //throw new Exception("Les données d'authentification sont incorrectes");
    }
    $hash = $resultats['password'];
    if (password_verify($passwdPost, $hash)) {
        //Initialisation du tableau qui va contenir les informations de l'utilisateur.
        $infoUser = array(
            'no' => $resultats['no'],
            'username' => $resultats['username'],
            'valid' => $resultats['valid'],
            'role' => $resultats['role'],
        );
    } else {
        $message = "The user does not exist or the password is incorrect";
        require 'view/login.php';
    }
    return @$infoUser;//renvoie certaines infos de l'utilisateur
}

function getUserByLogin($login)
{
    $db = connect();
    // Création de la string pour la requête
    $requete = "SELECT * 
                FROM User 
                WHERE username ='" . $login . "'";
    // Exécution de la requete
    return $db->query($requete);
}

?>