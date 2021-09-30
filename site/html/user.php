<!DOCTYPE html>
<html>
<head>
    <title>User details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/message.css">
</head>
<body>
<!-- Bootstrap 5 Contact Form Snippet -->

<div class="container px-5 my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 rounded-3 shadow-lg">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="h1 fw-light">User details</div>
                    </div>

                    <!-- * * * * * * * * * * * * * *
                    // * * SB Forms Contact Form * *
                    // * * * * * * * * * * * * * * *

                    // This form is pre-integrated with SB Forms.
                    // To make this form functional, sign up at
                    // https://startbootstrap.com/solution/contact-forms
                    // to get an API token!
                    -->

                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">

                        <!-- Username Input -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="username" type="text" placeholder="Username" data-sb-validations="required" disabled/>
                            <label for="username">Username</label>
                        </div>

                        <select class="form-select" aria-label="Roles">
                            <option value="1">Collaborator</option>
                            <option value="2">Administrator</option>
                        </select>

                        <br>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" type="text" placeholder="Password" data-sb-validations="required" />
                            <label for="password">Enter new password</label>
                            <div class="invalid-feedback" data-sb-feedback="password:required">New password is required.</div>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="confpassword" type="text" placeholder="Confirm password" data-sb-validations="required" />
                            <label for="password">Confirm new password</label>
                            <div class="invalid-feedback" data-sb-feedback="confpassword:required">Confirm new password.</div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Account validity</label>
                        </div>

                        <!-- Submit button -->
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Modify</button>
                        </div>
                    </form>
                    <!-- End of contact form -->

                </div>
            </div>
        </div>
    </div>
</div>

<!-- CDN Link to SB Forms Scripts -->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>

