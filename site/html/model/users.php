<?php


function hashPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

function updatePassword($id, $newPassword)
{
    $db = connect();
    $newPassword = hashPassword($newPassword);
    // Création de la string pour la requête
    $requete = "UPDATE User SET password='" . $newPassword . "' WHERE no = " . $id;
    // Exécution de la requete
    return $db->query($requete);
}

?>