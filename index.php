<!DOCTYPE html>
<!-- HTML5 Hello world by kirupa - http://www.kirupa.com/html5/getting_your_feet_wet_html5_pg1.htm -->
<html>

<head>
<meta charset="utf-8">
<title>Hello</title>
<style type="text/css">
*{
margin: 0px;
}

.buttonStyle {
	background-color: #F2f2f2;
	font-weight: bold;
	border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 150%;
    height: 100%;
    margin: 40px;
}

#border{
	width: 60%;
	margin: auto;
	background-color: #F2f2f2;
	margin-top: 10px;
}

.buttonContainer {
	display: -webkit-flex;
	display: flex;
	-webkit-justify-content: center;
	justify-content: center
}

.button{
	background-color: #4CAF50;
	border: none;
	color:white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin: 4px 2px;
	cursor: pointer;
}

#header{
	background-color: #f2f2f2;
	text-align: center;
	padding-top: 20px;
}


</style>
<link rel="stylesheet" href="Sign_in.css">
<title>HELLO</title>
</head>

<?php
	session_start();
	$loged_in = isset($_SESSION['email']);
	$email = "";
	if($loged_in) {
		$email = $_SESSION["email"];
	}
?>

<?php
	$menu = '
		hello ' . $email .
		'<a href="sign_out.php">sign out</a> <div class = "buttonContainer">
			<form class ="buttonStyle" action="add_pet.php">
			<input type="submit" class="button" value="Add Pet" /> 
			</form>
		</div>

		<div class = "buttonContainer">
			<form class ="buttonStyle" action="choose_pet.php">
			<input type="submit" class="button" value="Make Offer" />
			</form>
		</div>

		<div class = "buttonContainer">
			<form class ="buttonStyle" action="betaker.php">
			<input type="submit" class="button" value="Be Taker" />
			</form>
		</div>
	';
?>

<?php
	$login_form = '
		<p class="heading">Sign In</p>

		<form action="sign_in.php" autocomplete="on" method="POST">
			<label for="email">Email:</label></br>
			<input type="email" name="email" required>
			<br>
			<label for="password">Password:</label></br>
			<input type="password" name="password" required>
			<br><br>
			<input type="submit" value="Sign In">
		</form>
		<p>Don\'t have an account? <a href="Sign_up.php">Sign up here</a></p>
	';
?>

<body>
	<div id ="border">
		<?php 
			if($loged_in) {
				echo $menu;
			} else {
				echo $login_form;
			}
		?>
	</div>
</body>
</html>
