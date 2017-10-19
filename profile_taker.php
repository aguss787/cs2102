<!DOCTYPE html>
<html>
<head>
    <title>Profile user</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="afterlogin-user.css">
</head>
<body>
<ul>
	<li><a href="#">NAVY</a></li> <!--go to mainpage-->
	<li style="float:right"><a href="index.php">Sign out</a></li>
</ul>
<div>
<h1>Profile</h1>

<!--
The value in each form input should be taken from the database.
After submit, the new data replaces the old one in the database.
-->

<form action="" method="post">
	<label for="firstname">First name:</label><br>
	<input id="firstname" type="text" name="firstname" value="John" disabled> 
	<br>
	<label for="lastname">Last name:</label><br>
	<input id="lastname" type="text" name="lastname" value="Gates" disabled>
	<br>
	<label for="address">Address:</label><br>
	<input id="address" type="text" name="address" value="33 Sesame Street" disabled>
	<br>
	<label for="contact">Contact number:</label><br>
	<input id="contact" type="text" name="contact" value="892301" disabled>
	<br>
	<label for="psw">Password:</label><br>
	<input id="password" type="password" name="psw" value="298Dje" disabled>
	<br>
	<label for="preference">Preference:</label><br>
	<input id="preference" type="text" name="preference" value="I like dogs" disabled>
	<br><br>
	<input id="submit" type="submit" value="Change Profile" style="display:none;">
</form>

<button class="button" id="edit" onclick="edit()">Edit Profile</button>

<!-- The number of stars are taken from database -->
<h4>Feedback Ratings</h4>
<p>1 Star: 3</p>
<p>2 Star: 4</p>
<p>3 Star: 10</p>
<p>4 Star: 6</p>
<p>5 Star: 13</p>

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