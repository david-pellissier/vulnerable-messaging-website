<?php
session_set_cookie_params(10000); // durée de vie de session si > destruction automatique
session_start();

require  'controller/controller.php';

try
{
  if (isset($_GET['action']))
  {
    $action = $_GET['action'];
    switch ($action)
    {
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
     default :
        throw new Exception("L'action demandée est inconnue !");
    }   
  }
  else
    home();  
}
catch (Exception $e)
{
  echo $e->getMessage();
}