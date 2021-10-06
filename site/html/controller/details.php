<?php
    function show_msg_details() {
        $mail = getMailDetails($_GET['no'])->fetch();
        require('view/details.php');
    }

?>