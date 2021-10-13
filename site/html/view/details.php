<!DOCTYPE html>
<html lang="en">
<head>
    <title>Viewing message</title>
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
                            <div class="h1 fw-light">Message details</div>
                        </div>
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">

                            <div class="form-floating mb-3">
                                <input value="<?php echo substr($mail['date'], 0, 10) ?>" class="form-control" id="date" type="text" placeholder="Reception date" disabled/>
                                <label for="date">Reception date</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input value="<?php echo $mail['sender'] ?>" class="form-control" id="recipient" type="text" placeholder="Sender" disabled/>
                                <label for="recipient">Sender</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input value="<?php echo $mail['subject'] ?>" class="form-control" id="subject" type="text" placeholder="Subject" disabled/>
                                <label for="subject">Subject</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" placeholder="Message" style="height: 10rem;" disabled><?php echo $mail['body'] ?></textarea>
                                <label for="message">Message</label>
                            </div>

                            <div class="d-grid">
                                <button onclick="location.href = 'index.php?action=message&reply=<?php echo $mail['no']?>'" type="button" class="btn btn-primary">Reply</button>
                            </div>
                            <br>
                            <div class="d-grid">
                                <button onclick="location.href = 'index.php?action=delete_mail&no=<?php echo $mail['no']?>'" type="button" class="btn btn-danger">Delete</button>
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
