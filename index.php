<?php

// Tous mes champs sont obligatoires 
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required !';
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email_not_valid'] = 'Email is not valid !';
    }
    if (empty($_POST['firstname'])) {
        $errors['firstname'] = 'Firstname is required !';
    }
    if (empty($_POST['lastname'])) {
        $errors['lastname'] = 'Lastname is required !';
    }
    if (empty($_POST['phone'])) {
        $errors['phone'] = 'Phone is required !';
    }
    if ($_POST['subject'] === 'default') {
        $errors['subject'] = 'Subject is required !';
    }
    if (empty($_POST['message'])) {
        $errors['message'] = 'Message is required !';
    }
    if (empty($errors)) {
        header('Location: success.php?firstname='.$_POST['firstname'].'&lastname='.$_POST['lastname']);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les formulaires en PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1>Mon formulaire PHP</h1>
        </div>
        <div class="formulaire">
            <form method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <?php
                    if (isset($errors['email'])) {
                        echo "<p class='alert alert-danger mt-2'>" . $errors['email'] . "</p>";
                    }
                    if (isset($errors['email_not_valid'])) {
                        echo "<p class='alert alert-danger mt-2'>" . $errors['email_not_valid'] . "</p>";
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname *</label>
                    <input type="text" name="firstname" class="form-control" id="firstname">
                    <?php
                    if (isset($errors['firstname'])) {
                        echo "<p class='alert alert-danger mt-2'>" . $errors['firstname'] . "</p>";
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname *</label>
                    <input type="text" name="lastname" class="form-control" id="lastname">
                    <?php
                    if (isset($errors['lastname'])) {
                        echo "<p class='alert alert-danger mt-2'>" . $errors['lastname'] . "</p>";
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone *</label>
                    <input type="text" name="phone" class="form-control" id="phone">
                    <?php
                    if (isset($errors['phone'])) {
                        echo "<p class='alert alert-danger mt-2'>" . $errors['phone'] . "</p>";
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject *</label>
                    <select class="form-select" id="subject" name="subject">
                        <option value="default">Select</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <?php
                    if (isset($errors['subject'])) {
                        echo "<p class='alert alert-danger mt-2'>" . $errors['subject'] . "</p>";
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message *</label>
                    <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                    <?php
                    if (isset($errors['message'])) {
                        echo "<p class='alert alert-danger mt-2'>" . $errors['message'] . "</p>";
                    }
                    ?>
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="text-center">
                    <p><small>* All fields are required !</small></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>