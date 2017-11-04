<?php
    session_start();

    $logged_in = isset($_SESSION['email']);

    if(!$logged_in) {
        header('Location:./index.php');
    }
?>

<?php
    include_once __DIR__ . '/controller/petController.php';
  include_once __DIR__ . '/controller/userController.php';

  $user = getCurrentUser();

  /* THE DEFAULT VALUE OF ADDRESS AND CONTACT ARE THE OWNER'S*/
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $logged_in) {
        addPet($_SESSION['email'], $_POST['name'], $_POST['type'], $_POST['description'],
            $user->address, $user->contact_number);
        header('Location:./index.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Pet</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<?php include 'navbar.php';?>

<div class="container">
<div class="center">
<h1>Add Pet</h1>

<form action="add_pet.php" method="post">
  Name:<br>
  <input type="text" name="name" required>
  <br>
  Pet Type:<br>
  <input type="text" name="type" placeholder="For example, Dog" required>
  <br>
  Description:<br>
  <input type="text" name="description" required>
  <br><br>
  <input type="submit" value="Add Pet">
</form>
</div>
</div>
</body>
</html>
