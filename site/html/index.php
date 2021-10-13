<?php
session_set_cookie_params(10000); // durée de vie de session si > destruction automatique
session_start();

require 'controller/controller.php';

try {
    // Permet de rediriger sur les bonnes pages en fonction de ce qui est passé dans le paramètre GET action
    if (isset($_GET['action']) && $_SESSION['isConnected']) {
        $action = $_GET['action'];
        switch ($action) {
            case 'home' :
                home();
                break;
            case 'message' :
                new_msg();
                break;
            case 'details' :
                show_msg_details();
                break;
            case 'logout':
                logout();
                break;
            case 'login' :
                login();
                break;
            case 'admin':
                administration();
                break;
            case 'delete_mail':
                deleteMail();
                break;
            case 'change_password':
            case 'update_user':
                changeUserDetails();
                break;
            case 'delete_user':
                deleteUser();
                break;
            case 'add_user':
                addUser();
                break;
            default :
                throw new Exception("Requested action unknown");
        }
    } else
        home();
} catch (Exception $e) {
    // si une exception non-gérée survient, on affiche une erreur 500
    http_response_code(500);
    echo $e->getMessage();
}