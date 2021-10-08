<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mailbox</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mailbox.css" type="text/css">
</head>
<body>
<?php require 'view/components/info_to_user.php'?>
<div class="root">
    <?php require 'view/components/sidebar.php' ?>
    <div class="table-responsive">
        <h1><?php echo $_SESSION['username'] ?></h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Sender</th>
                    <th class="wide">Subject</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($mails as $mail){ ?>
                <tr>
                    <td class="date"><?php echo $mail['date'] ?></td>
                    <td class="sender"><?php echo $mail['sender'] ?></td>
                    <td class="subject"><?php echo $mail['subject'] ?></td>
                    <td><button onclick="location.href = 'index.php?action=message&reply=<?php echo $mail['no']?>'" type="button" class="btn btn-primary">Reply</button>
                    <button onclick="location.href = 'index.php?action=details&no=<?php echo $mail['no']?>'" type="button" class="btn btn-info">Open</button>
                    <button onclick="location.href = 'index.php?action=delete_mail&no=<?php echo $mail['no']?>'" type="button" class="btn btn-danger">Delete</button></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
