<?php
    session_start();

    include_once __DIR__ . '/controller/userController.php';

    $email = $_POST['email'];
    $pass = $_POST['password'];

    if(signIn($email, $pass)) {
        $_SESSION['email'] = $email;
    }
    
    header('Location:./index.php');
?>