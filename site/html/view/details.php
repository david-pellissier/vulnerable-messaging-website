<!DOCTYPE html>
<html lang="en">
<head>
    <title>Viewing message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/message.css">
</head>
<body>
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
                            <input class="form-control" id="date" type="text" placeholder="Reception date" disabled/>
                            <label for="date">Reception date</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="recipient" type="text" placeholder="Sender" disabled/>
                            <label for="recipient">Sender</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="subject" type="text" placeholder="Subject" disabled/>
                            <label for="subject">Subject</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" placeholder="Message" style="height: 10rem;" disabled></textarea>
                            <label for="message">Message</label>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg " id="replyButton" type="submit">Reply</button>
                        </div>
                        <br>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg " id="eraseButton" type="submit">Erase</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CDN Link to SB Forms Scripts -->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
