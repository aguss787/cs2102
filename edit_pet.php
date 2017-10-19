<!DOCTYPE html>
<html>
<head>
    <title>Edit Pet</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="afterlogin-user.css">
</head>
<!--
<?php
    session_start();
    $loged_in = isset($_SESSION['email']);
    $email = "";
    if(!$loged_in) {
        header('Location:./index.php');
    } else {
        $email = $_SESSION['email'];
    }
?>

<?php
    include_once __DIR__ . '/controller/petController.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $loged_in) {
        addPet($email, $_POST['name'], $_POST['type'], $_POST['description'],
               NULL, NULL);
    }
    echo "YEY ITS OK!";
?>
-->
<body>
<ul>
    <li><a href="#">NAVY</a></li> <!--go to mainpage-->
    <li style="float:right"><a href="index.php">Sign out</a></li>
</ul>
<div>
<p class="heading">Edit Pet</p>

<!-- The value of each input is taken from the database according to the pet clicked on the edit button -->
<form action="edit_pet.php" method="post">
	<label for="name">Name:</label></br>
	<input type="text" name="name" value="Lulu">
	<br>
	<label for="type">Pet Type:</label></br>
	<input type="text" name="type" value="Dog">
	<br>
	<label for="description">Description:</label></br>
	<input type="text" name="description" value="The dog has rabies">
	<br>
	<label for="contact">Contact number:</label></br> <!-- default value is the owner number -->
	<input type="text" name="type" value="88888888">
	<br>
	<label for="address">Address:</label></br>
	<input type="text" name="type" value="SOC"> <!--default value is the owner address-->
	<br><br>
	<input type="submit" value="Edit Pet">
</form>
<p>Go back to <a href="#">main page</a></p>
</div>

</body>
</html>