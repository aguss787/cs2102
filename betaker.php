<?php
    session_start();

    $logged_in = isset($_SESSION['email']);

    if(!$logged_in) {
        header('Location:./index.php');
    }
?>

<?php
  include_once __DIR__ . '/controller/userController.php';

  if (!$logged_in) {
    echo "Nope belom login";
    exit();
  }

  upgradeToTaker($_SESSION['email']);
  header('Location:./index.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Why are you here?</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<?php include 'navbar.php';?>

<div class="container">
<div class="center">
<h1>???</h1>
Why are you here?
get the f*ck out.
</div>
</div>
</body>
</html>


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
