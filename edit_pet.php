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

<!-- The value of each input is taken from the database according to the pet clicked on the edit button -->
<form action="edit_pet.php" method="post">
  Name:</br>
  <input type="text" name="name" value="Lulu">
  <br>
  Pet Type:</br>
  <input type="text" name="type" value="Dog">
  <br>
  Description:</br>
  <input type="text" name="description" value="The dog has rabies">
  <br>
  Contact number:</br> <!-- default value is the owner number -->
  <input type="text" name="type" value="88888888">
  <br>
  Address:</br>
  <input type="text" name="type" value="SOC"> <!--default value is the owner address-->
  <br><br>
  <input type="submit" value="Edit Pet">
</form>
</div>
</div>
</body>
</html>