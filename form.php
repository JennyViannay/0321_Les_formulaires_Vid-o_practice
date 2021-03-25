<?php
// Tous mes champs sont obligatoires 
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (empty($_GET['email'])) {
        $errors['email'] = 'Email is required !';
    }
    if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email_not_valid'] = 'Email is not valid !';
    }
    var_dump($errors);
    if (empty($_GET['firstname'])) {
        $errors['firstname'] = 'Firstname is required !';
    }
    if (empty($_GET['lastname'])) {
        $errors['lastname'] = 'Lastname is required !';
    }
    if (empty($_GET['phone'])) {
        $errors['phone'] = 'Phone is required !';
    }
    if ($_GET['subject'] === 'default') {
        $errors['subject'] = 'Subject is required !';
    }
    if (empty($_GET['message'])) {
        $errors['message'] = 'Message is required !';
    }
}

?>

<div class="container">
    <p class="alert alert-success">
        <?php echo "Merci " . $_GET['firstname'] . " " . $_GET['lastname']; ?>
    </p>

    <?php 
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<p class='alert alert-danger mt-2'>" . $error . "</p>";
            }
        }

    ?>
</div>