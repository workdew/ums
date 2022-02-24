<?php require 'includes/connection.php' ?>
<?php require 'includes/functions.php' ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (authenticate($email, $password)) {
        prepareUserSession($email);
        setMsg('Logged in successfully', 'success');
        redirect('/dashboard.php');
    }

    setMsg('Invalid email or bad password');
    redirect('/login.php');
}
