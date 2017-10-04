<!DOCTYPE html>

<?php
    session_start();
    $loged_in = isset($_SESSION['email']);
    if($loged_in) {
        header('Location:./index.php');
    }
?>

<?php
    include_once __DIR__ . '/controller/userController.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        signUp($_POST['email'], $_POST['password'], $_POST['firstname'], 
               $_POST['lastname'], $_POST['address'], $_POST['contact'], false);
      echo "YEY ITS OK!";
    } 

?>

<html>
  <head>
      <title>Sign Up</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" href="Sign_up.css">
  </head>
  <body>
    <div>
      <p class="heading">Sign Up</p>

      <form action="sign_up.php" autocomplete="on" method="post">
      	<label for="first_name">First name:</label></br>
      	<input type="text" name="firstname" required>
      	<br>
      	<label for="last_name">Last name:</label></br>
      	<input type="text" name="lastname" required>
      	<br>
      	<label for="address">Address:</label></br>
      	<input type="text" name="address" required>
      	<br>
      	<label for="contact_number">Contact number:</label></br>
      	<input type="text" name="contact" required>
      	<br>
      	<label for="email">Email:</label></br>
      	<input type="email" name="email" required>
      	<br>
      	<label for="password">Password:</label></br>
      	<input type="password" name="psw" required>
      	<br><br>
      	<input type="submit" value="Sign Up">
      </form>
    </div>
  </body>
</html>
