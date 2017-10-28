<!DOCTYPE html>
<html>
<head>
    <title>Profile user</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<?php include 'navbar.php';?>

<div class="container">
<div class="center">
<h1>Profile</h1>

<!--
The value in each form input should be taken from the database.
After submit, the new data replaces the old one in the database.
-->

<form action="" method="post">
  First name:<br>
  <input id="firstname" type="text" name="firstname" value="John" disabled> 
  <br>
  Last name:<br>
  <input id="lastname" type="text" name="lastname" value="Gates" disabled>
  <br>
  Address:<br>
  <input id="address" type="text" name="address" value="33 Sesame Street" disabled>
  <br>
  Contact number:<br>
  <input id="contact" type="text" name="contact" value="892301" disabled>
  <br>
  Password:<br>
  <input id="password" type="password" name="psw" value="298Dje" disabled>
  <br><br>
  <input id="submit" type="submit" value="Change Profile" style="display:none;">
</form>

<button class="button" id="edit" onclick="edit()">Edit Profile</button>
</div>
</div>

<script>
function edit() {
	document.getElementById("firstname").disabled = false;
	document.getElementById("lastname").disabled = false;
	document.getElementById("address").disabled = false;
	document.getElementById("contact").disabled = false;
	document.getElementById("password").disabled = false;
	document.getElementById("submit").style.display = "inline";
	document.getElementById("edit").style.display = "none";
}
</script>

</body>
</html>