<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Users</title>
    <meta charset="ISO-8859-1">
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
        <table class="table">
            <thead>
            <tr>
                <th>Username</th>
                <th>Account validity</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($users as $user){ ?>
                <tr>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php if ($user['valid']) { echo "enabled";} else { echo "disabled";}  ?></td>
                    <td><?php if ($user['role']) { echo "Administrator";} else { echo "Collaborator";} ?></td>
                    <td>
                        <a class="btn btn-success btn-xs glyphicon glyphicon-ok" href="index.php?action=update_user&no=<?php echo $user['no'] ?>"
                           title="View">Edit</a>
                        <a class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="index.php?action=delete_user&no=<?php echo $user['no'] ?>" title="Delete">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <a class="btn btn-success btn-xs glyphicon glyphicon-ok" href="index.php?action=add_user" title="View">Add user</a>
    </div>
</div>
</body>
</html>
