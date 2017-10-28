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
  Name:</br>
  <input type="text" name="name" required>
  <br>
  Pet Type:</br>
  <input type="text" name="type" placeholder="For example, Dog" required>
  <br>
  Description:</br>
  <input type="text" name="description" required>
  <br><br>
  <input type="submit" value="Add Pet">
</form>
</div>
</div>
</body>
</html>