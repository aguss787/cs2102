<?php
    session_start();

    $logged_in = isset($_SESSION['email']);

    if(!$logged_in) {
        header('Location:./index.php');
    }
?>

<?php
  include_once __DIR__ . '/controller/petController.php';

  if (!$logged_in) {
    echo "Nope belom login";
    exit();
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (strcmp($_SESSION['email'], $_POST['owner']) != 0) {
      echo "Nope bukan pet lu. jangan main edit";
      exit();
    }
    deletePet($_POST['owner'], $_POST['name']);
    header('Location:./index.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Why you are here?</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<?php include 'navbar.php';?>

<div class="container">
<div class="center">
<h1>???</h1>
Why you are here?
get the f*ck out.
</div>
</div>
</body>
</html>
