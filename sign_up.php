<?php
    session_start();
    $logged_in = isset($_SESSION['email']);
    if($logged_in) {
        header('Location:./mainpage.php');
    }
?>

<?php
    include_once __DIR__ . '/controller/userController.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        signUp($_POST['email'], $_POST['password'], $_POST['firstname'],
               $_POST['lastname'], $_POST['address'], $_POST['contact'], false);
		signIn($_POST['email'], $_POST['password']);
		header('Location:./mainpage.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<?php include 'navbar.php';?>

<div class="container">
<div class="center">
<h1>Sign Up</h1>

<form action="sign_up.php" autocomplete="on" method="post">
  First name:</br>
  <input type="text" name="firstname" required>
  <br>
  Last name:</br>
  <input type="text" name="lastname" required>
  <br>
  Address:</br>
  <input type="text" name="address" required>
  <br>
  Contact number:</br>
  <input type="text" name="contact" required>
  <br>
  Email:</br>
  <input type="email" name="email" required>
  <br>
  Password:</br>
  <input type="password" name="password" required>
  <br><br>
  <input type="submit" value="Sign Up">
</form>

</div>
</div>
</body>
</html>
