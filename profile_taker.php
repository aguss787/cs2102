<!DOCTYPE html>
<html>
<head>
    <title>Profile user</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
    color: orange;
}
</style>
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
  <br>
  Preference:<br>
  <input id="preference" type="text" name="preference" value="I like dogs" disabled>
  <br><br>
  <input id="submit" type="submit" value="Change Profile" style="display:none;">
</form>

<button class="button" id="edit" onclick="edit()">Edit Profile</button>

<!-- The number of stars are taken from database -->
<h4>Feedback Ratings</h4>
<!-- Five Stars -->
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span> 521</span>
<br>
<!-- Four Stars -->
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span> 298</span>
<br>
<!-- Three Stars -->
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span> 48</span>
<br>
<!-- Two Stars -->
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span> 13</span>
<br>
<!-- One Star -->
<span class="fa fa-star checked"></span>
<span> 6</span>

</div>
</div>

<script>
function edit() {
	document.getElementById("firstname").disabled = false;
	document.getElementById("lastname").disabled = false;
	document.getElementById("address").disabled = false;
	document.getElementById("contact").disabled = false;
	document.getElementById("password").disabled = false;
	document.getElementById("preference").disabled = false;
	document.getElementById("submit").style.display = "inline";
	document.getElementById("edit").style.display = "none";
}
</script>

</body>
</html>