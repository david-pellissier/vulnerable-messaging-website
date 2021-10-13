<?php
/**
 * Fonction appelée dans l'index.php afin de retourner les détails d'un mail, eux-mêmes retournés par la
 * fonction getMailDetails située dans la partie model
 */
function show_msg_details() {
    // la variable $mail est ensuite utilisée pour afficher les détails du mail dans la vue details.php
    $mail = getMailDetails($_GET['no'])->fetch();
    require('view/details.php');
}
?>