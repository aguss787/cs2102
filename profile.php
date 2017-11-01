<?php
	session_start();

    $logged_in = isset($_SESSION['email']);
    $email = "";

    if(!$logged_in) {
        header('Location:./index.php');
    }
?>

<?php
	include_once __DIR__ . '/controller/userController.php';
	
	$user = getCurrentUser();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile User</title>
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

<form action="profile.php" method="post">
  First name:<br>
  <?php
  echo '<input id="firstname" type="text" name="firstname" value="' . $user->firstName . '" disabled>';
  ?>
  <br>
  Last name:<br>
  <?php
  echo '<input id="lastname" type="text" name="lastname" value="' . $user->lastName . '" disabled>';
  ?>
  <br>
  Address:<br>
  <?php
  echo '<input id="address" type="text" name="address" value="' . $user->address . '" disabled>';
  ?>
  <br>
  Contact number:<br>
  <?php
  echo '<input id="contact" type="text" name="contact" value="' . $user->contactNumber . '" disabled>';
  ?>
  <br>
  Password:<br>
  <?php
  echo '<input id="password" type="password" name="psw" value="' . $user->password . '" disabled>';
  ?>
<!-- If user is taker, show, else hide -->
  <?php
	if ($user->activate) {
		echo '<br>Preference:<br>
		<input id="preference" type="text" name="preference" value="' . $user->preference . '" disabled>';
	}
  ?>
  <br><br>
  <input id="submit" type="submit" value="Change Profile" style="display:none;">
</form>

<button class="button" id="edit" onclick="edit()">Edit Profile</button>

<?php
	if ($user->activate) {
		echo '<h4>Feedback Ratings</h4>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span>' . $user->five_star . '</span>';
		echo '<br>';
		
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span>' . $user->four_star .'</span>';
		echo '<br>';
	
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span>' . $user->three_star . '</span>';
		echo '<br>';

		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span>' . $user->two_star . '</span>';
		echo '<br>';

		echo '<span class="fa fa-star checked"></span>';
		echo '<span>' . $user->one_star . '</span>';
	}
?>

</div>
</div>

<script>
function edit() {
	document.getElementById("firstname").disabled = false;
	document.getElementById("lastname").disabled = false;
	document.getElementById("address").disabled = false;
	document.getElementById("contact").disabled = false;
	document.getElementById("password").disabled = false;
	
	var istaker = "<?php echo $user->activate; ?>";
	if (istaker == true) {
		document.getElementById("preference").disabled = false;
	}
	
	document.getElementById("submit").style.display = "inline";
	document.getElementById("edit").style.display = "none";
}
</script>

</body>
</html>