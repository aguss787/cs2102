<?php
    session_start();
	
    $logged_in = isset($_SESSION['email']);

    if(!$logged_in) {
        header('Location:./index.php');
    }
?>

<?php
	include_once __DIR__ . '/controller/petController.php';
	
	/* $_SESSION['pet_name'] is assigned from mainpage when clicking on the edit_pet button */
	$pet = getPet($_SESSION['email'], $_SESSION['pet_name']);
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && $logged_in) {
        editPet($_SESSION['email'], $_POST['name'], $_POST['type'], $_POST['description'],
               $_POST['prev_address'], $_POST['prev_contact_number']);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pet</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<?php include 'navbar.php';?>

<div class="container"> 
<div class="center">
<h1>Edit Pet</h1>

<form action="edit_pet.php" method="post">
  Name:<br>
  <?php
  echo '<input type="text" name="name" value="' . $pet->name . '">';
  ?>
  <br>
  Pet Type:<br>
  <?php
  echo '<input type="text" name="type" value="' . $pet->type . '">';
  ?>
  <br>
  Description:<br>
  <?php
  echo '<input type="text" name="description" value="' . $pet->description . '">';
  ?>
  <br>
  Address:<br>
  <?php
  echo '<input type="text" name="prev_address" value="' . $pet->prev_address . '">';
  ?>
  <br>
  Contact number:<br>
  <?php
  echo '<input type="text" name="prev_contact_number" value="' . $pet->prev_contact_number . '">';
  ?>
  <br><br>
  <input type="submit" value="Edit Pet">
</form>
</div>
</div>
</body>
</html>