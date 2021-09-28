<?php
session_start();
?>

<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>

<html lang = "en">

<head>
    <title>Login page</title>
    <link href = "css/bootstrap.min.css" rel = "stylesheet">
</head>

<body>

<h2>Login page</h2>
<div class = "container form-signin">

    <?php
    $msg = '';

    if (isset($_POST['login']) && !empty($_POST['username'])
        && !empty($_POST['password'])) {

        if ($_POST['username'] == 'tutorialspoint' && $_POST['password'] == '1234') {
            $_SESSION['valid'] = true;
            $_SESSION['username'] = 'tutorialspoint';

            echo 'You have entered valid use name and password';
        }else {
            $msg = 'Wrong username or password';
        }
    }
    ?>
</div> <!-- /container -->

<div class = "container">

    <form class = "form-signin" role = "form"
          action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
          ?>" method = "post">
        <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
        <input type = "text" class = "form-control"
               name = "username" required autofocus></br>
        <input type = "password" class = "form-control" name = "password" required>
        <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Login</button>
    </form>
</div>

</body>
</html>
