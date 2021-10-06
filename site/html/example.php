<html>
<head></head>
<body>

<?php
    $hash = password_hash("admin", PASSWORD_DEFAULT);
    print_r($hash);


    print_r(password_verify("admin", $hash));
?>
</body>
</html>
