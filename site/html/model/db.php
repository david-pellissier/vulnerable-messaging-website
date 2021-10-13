<?php

/**
 * Fonction permettant de se connecter à la DB SQLite
 */
function connect(){
    try {
        // Create (connect to) SQLite database in file
        $pdo = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // Set errormode to exceptions
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch(PDOException $e) {
        // Print PDOException message
        echo $e->getMessage();
    }
    return $pdo;
}
$con = connect();
?>