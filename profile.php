<?php
	session_start();

    $logged_in = isset($_SESSION['email']);

    if(!$logged_in) {
        header('Location:./index.php');
    }
?>

<?php
	include_once __DIR__ . '/controller/userController.php';
	include_once __DIR__ . '/controller/takerController.php';


    if(!isset($_GET['email']))
        $_GET['email'] = $_SESSION['email'];

	$user = getUser($_GET['email']);

	$istaker = isTaker($_GET['email']);
	if ($istaker) {
		$taker = getTaker($_GET['email']);
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && $logged_in && $_POST['email'] === $_SESSION['email']) {
		editProfileUser($_SESSION['email'], $_POST['password'], $_POST['firstname'],
			$_POST['lastname'], $_POST['address'], $_POST['contact']);
		if ($istaker) {
			editProfileTaker($_SESSION['email'], $_POST['preference']);
		}
        $user = getCurrentUser();
	}
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

<form action="profile.php" method="post">
  First name:<br>
  <?php
  echo '<input id="firstname" type="text" name="firstname" value="' . $user->first_name . '" disabled>';
  ?>
  <br>
  Last name:<br>
  <?php
  echo '<input id="lastname" type="text" name="lastname" value="' . $user->last_name . '" disabled>';
  ?>
  <br>
  Address:<br>
  <?php
  echo '<input id="address" type="text" name="address" value="' . $user->address . '" disabled>';
  ?>
  <br>
  Contact number:<br>
  <?php
  echo '<input id="contact" type="text" name="contact" value="' . $user->contact_number . '" disabled>';
  ?>
  <?php
  if($_GET['email'] === $_SESSION['email']){
      echo '<br>Password:<br>';
      echo '<input id="password" type="password" name="password" value="' . $user->password . '" disabled>';
  }
  ?>
<!-- If user is taker, show, else hide -->
  <?php
	if ($istaker) {
		echo '<br>Preference:<br>';
		echo '<input id="preference" type="text" name="preference" value="' . $taker->preference . '" disabled>';
	}
  ?>
  <br><br>
  <?php
    if($_GET['email'] === $_SESSION['email'])
        echo '<input id="submit" type="submit" value="Change Profile" style="display:none;">';
  ?>
</form>

<?php
    if($_GET['email'] === $_SESSION['email'])
        echo '<button class="button" id="edit" onclick="edit()">Edit Profile</button>';
  ?>

<?php
	if ($istaker) {
		echo '<h4>Feedback Ratings</h4>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span>' . $taker->five_star . '203</span>';
		echo '<br>';

		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span>' . $taker->four_star .'423</span>';
		echo '<br>';

		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span>' . $taker->three_star . '23</span>';
		echo '<br>';

		echo '<span class="fa fa-star checked"></span>';
		echo '<span class="fa fa-star checked"></span>';
		echo '<span>' . $taker->two_star . '12</span>';
		echo '<br>';

		echo '<span class="fa fa-star checked"></span>';
		echo '<span>' . $taker->one_star . '2</span>';
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

	var istaker = "<?php echo $istaker ? "true" : "false"; ?>";
	if (istaker === "true") {
		document.getElementById("preference").disabled = false;
	}

	document.getElementById("submit").style.display = "inline";
	document.getElementById("edit").style.display = "none";
}
</script>

</body>
</html>
