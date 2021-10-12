<style>
    nav {
        display:flex;
        flex-direction: column;
        gap:12px;
        padding:12px;
        margin:8px;
        border-right: #dedede solid 1px;
    }
    .btn {
        height:max-content;
        font-size:12px;
        align-content: center
    }

    nav > a, nav > a:hover {
        color: black;
        text-decoration:none;
    }

</style>
<link rel="stylesheet" href="css/global.css" type="text/css">
<nav id="mainSidenav" class="navbar-right">

        <a href="/"><h1 class="grid-title">Mailbox</h1><br/></a>
        <a href="index.php?action=message" class="btn btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> New message</a>
        <br>
        <a href="index.php?action=change_password&no=<?php echo $_SESSION['no'] ?>" class="btn btn-success" data-toggle="modal" data-target="#compose-modal">Change password</a>
        <br>
        <?php if($_SESSION['role'] == ROLE_ADMIN) { ?>
            <a href="index.php?action=admin" class="btn btn-warning" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-list" aria-hidden="true"></i> Users list</a>
            <br/>
        <?php } ?>
        <a href="index.php?action=logout" class="btn btn-danger" data-toggle="modal" data-target="#compose-modal">Disconnect</a>

</nav>