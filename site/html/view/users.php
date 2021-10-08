<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Users</title>
</head>
<body>
<?php require 'view/components/info_to_user.php' ?>
<div class="root">
    <?php require 'view/components/sidebar.php' ?>
    <div class="container bootstrap snippets bootdey">
        <div class="header">
            <h3 class="text-muted prj-name">
                <span class="fa fa-users fa-2x principal-title"></span>
                Users
            </h3>
        </div>

        <div class="jumbotron list-content">
            <ul class="list-group">
                <li class="list-group-item text-left">
                    <label class="name">
                        Juan guillermo cuadrado
                    </label>
                    <label class="pull-right">
                        <a class="btn btn-success btn-xs glyphicon glyphicon-ok" href="usermodify.php"
                           title="View">Edit</a>
                        <a class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="#" title="Delete">Delete</a>
                    </label>
                    <div class="break"></div>
                </li>
            </ul>
            <br>
            <a class="btn btn-success btn-xs glyphicon glyphicon-ok" href="usercreation.php" title="View">Add user</a>
        </div>
    </div>
</div>

</body>
</html>
