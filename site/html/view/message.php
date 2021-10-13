<!DOCTYPE html>
<html lang="en">
<head>
    <title>Writing message</title>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/message.css">
    <meta charset="ISO-8859-1">
</head>
<body>
<?php require 'view/components/info_to_user.php'?>
    <div class="root">
    <?php require 'view/components/sidebar.php' ?>
    <div class="container px-5 my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 rounded-3 shadow-lg">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="h1 fw-light">Write a new message</div>
                        </div>
                        <form method="post" action="index.php?action=message" id="contactForm" data-sb-form-api-token="API_TOKEN">

                            <div class="form-floating mb-3">
                                <input value="<?php if (isset($_GET['reply'])) echo $mail['sender'] ?>" name="recipient" class="form-control" id="recipient" type="text" placeholder="Recipient" data-sb-validations="required" />
                                <label for="recipient">Recipient</label>
                                <div class="invalid-feedback" data-sb-feedback="recipient:required">Recipient is required.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input value="<?php if (isset($_GET['reply'])) echo "RE:" . $mail['subject'] ?>" name="subject" class="form-control" id="subject" type="text" placeholder="Subject" data-sb-validations="required" />
                                <label for="subject">Subject</label>
                                <div class="invalid-feedback" data-sb-feedback="subject:required">Subject is required.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea name="body" class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"><?php if (isset($_GET['reply'])) echo "\n\n-------------------------------------\n" . $mail['body'] ?></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
