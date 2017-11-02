<?php
    session_start();
	
    $logged_in = isset($_SESSION['email']);

    if(!$logged_in) {
        header('Location:./index.php');
    }
?>

<?php
	include_once __DIR__ . '/controller/petController.php';
	
	if (!logged_in) {
		echo "Nope belom login";
		exit();
	}
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (strcmp($_SESSION['email'], $_POST['owner']) != 0) {
			echo "Nope bukan pet lu. jangan main edit";
			exit();
		}
		editPet($_SESSION['email'], $_POST['name'], $_POST['type'], $_POST['description'],
                $_POST['prev_address'], $_POST['prev_contact_number']);
		$pet = getPet($_POST['owner'], $_POST['name']);
	} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {		
		if (strcmp($_SESSION['email'], $_GET['owner']) != 0) {
			echo "Nope bukan pet lu. jangan coba edit";
			exit();
		}
		/* $_SESSION['pet_name'] is assigned from mainpage when clicking on the edit_pet button */
		$pet = getPet($_GET['owner'], $_GET['name']);
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
  <?php
  echo '<input type="hidden" name="name" value="' . $pet->owner . '">';
  ?>
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