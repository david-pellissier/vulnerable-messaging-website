<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create a new user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/message.css">
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
                            <div class="h1 fw-light">Create a new user</div>
                        </div>
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">

                            <div class="form-floating mb-3">
                                <input class="form-control" id="username" type="text" placeholder="Username"
                                       data-sb-validations="required"/>
                                <label for="username">Username</label>
                            </div>

                            <select class="form-select" aria-label="Roles">
                                <option value="1">Collaborator</option>
                                <option value="2">Administrator</option>
                            </select>
                            <br>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" type="password" placeholder="Password"
                                       data-sb-validations="required"/>
                                <label for="password">Enter new password</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">New password is
                                    required.
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="confpassword" type="password"
                                       placeholder="Confirm password" data-sb-validations="required"/>
                                <label for="confpassword">Confirm new password</label>
                                <div class="invalid-feedback" data-sb-feedback="confpassword:required">Confirm new
                                    password.
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">Account validity</label>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>

