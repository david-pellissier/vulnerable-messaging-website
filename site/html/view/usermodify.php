<!DOCTYPE html>
<html lang="en">
<head>
    <title>User details</title>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/message.css">
    <meta charset="ISO-8859-1">
</head>
<body>
<?php require 'view/components/info_to_user.php' ?>
<div class="root">
    <?php require 'view/components/sidebar.php' ?>
    <div class="container px-5 my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 rounded-3 shadow-lg">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="h1 fw-light">User details</div>
                        </div>
                        <form id="contactForm"
                              action="index.php?action=<?php echo $isCreation ? "add_user" : "update_user"?>&no=<?php echo $_GET['no'] ?>" method="POST">

                            <div class="form-floating mb-3">
                                <input class="form-control" id="username" type="text" placeholder="Username"
                                       name="username" value="<?php echo $user['username'] ?>"
                                    <?php if ($_SESSION['role'] == ROLE_USER || !$isCreation) {
                                        echo "disabled";
                                    } ?> required/>
                                <label for="username">Username</label>
                            </div>

                            <select class="form-select" aria-label="Roles"
                                    name="role" <?php if ($_SESSION['role'] == ROLE_USER) {
                                echo "disabled";
                            } ?>>
                                <option value="0" <?php if ($user['role'] == ROLE_USER) {
                                    echo "selected";
                                } ?>>Collaborator
                                </option>
                                <option value="1" <?php if ($user['role'] == ROLE_ADMIN) {
                                    echo "selected";
                                } ?>>Administrator
                                </option>
                            </select>
                            <br>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" type="password" placeholder="Password"
                                       name="password"
                                    <?php if ($_SESSION['role'] == ROLE_USER) {
                                        echo "required";
                                    } ?>/>
                                <label for="password">Enter new password</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="confpassword" type="password"
                                       placeholder="Confirm password" name="confpassword"
                                    <?php if ($_SESSION['role'] == ROLE_USER) {
                                        echo "required";
                                    } ?>/>
                                <label for="confpassword">Confirm new password</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="defaultCheck1" name="valid"
                                    <?php
                                    if ($_SESSION['role'] == ROLE_USER) {
                                        echo "disabled ";
                                    }
                                    if ($user['valid'] == 1) {
                                        echo "checked";
                                    }
                                    ?>
                                />
                                <label class="form-check-label" for="defaultCheck1">Account validity</label>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" id="submitButton" type="submit"><?php echo $isCreation ? "Create" : "Edit"?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "view/components/password_repeat_check.html" ?>
</body>
</html>

