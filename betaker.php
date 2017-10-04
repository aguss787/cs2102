<?php
    session_start();

    include_once __DIR__ . '/controller/userController.php';

    $loged_in = isset($_SESSION['email']);
    if(!$loged_in) {
        header('Location:./index.php');
    }

    echo "!";
    echo $_SESSION['email'];
    echo "!";

    try{
        upgradeToTaker($_SESSION['email']);
    } catch (Exception $e) {
        echo 'Caught exception!';
    }

    echo "YEY NOW YOU'RE A TAKER :)";
?>