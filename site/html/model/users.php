<?php
$message = "";

function hashPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

function updatePassword($id, $newPassword)
{
    $db = connect();
    $newPassword = hashPassword($newPassword);
    // Création de la string pour la requête
    $request = "UPDATE User SET password='" . $newPassword . "' WHERE no = " . $id;
    // Exécution de la requete
    return $db->query($request);
}

function updateUserNonEmptyFields($id){

    $db = connect();
    $request = "UPDATE User SET ";

    if(isset($_POST['role'])){
        $request .= "role=" . $_POST['role']%2 . " "; // mod 1 car role = 0 ou 1
    }

    // valid n'est pas envoyé si la checkbox n'est pas cochée depuis la vue
    $request .= ", valid=";
    $request .= isset($_POST['valid']) ? "1 " : "0 ";


    $request .= "WHERE no=" . $id;

    return $db->query($request);

}

function getUserByID($no)
{
    $db = connect();

    $request = "SELECT no, username, valid, role 
                FROM User 
                WHERE no ='" . $no . "'";

    return $db->query($request);
}

function getAllUsers()
{

    $db = connect();

    $request = "SELECT no, username, valid, role FROM User";

    return $db->query($request);

}

function dropUser($id)
{
    $db = connect();

    $request = "DELETE FROM User WHERE no = " . $id;

    return $db->query($request);
}


function insertUser($username, $password, $valid, $role)
{
    $db = connect();

    $password = password_hash($password, PASSWORD_DEFAULT);

    $request = "INSERT INTO User (username, password, valid, role) VALUES ('$username', '$password', '$valid', '$role')";
    return $db->query($request);

}
