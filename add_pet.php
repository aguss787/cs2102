<!DOCTYPE html>
<html>
<head>
    <title>Add Pet</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Sign_up.css">
</head>

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

<body>

<div>
<p class="heading">Add Pet</p>

<form action="add_pet.php" method="post">
	<label for="name">Name:</label></br>
	<input type="text" name="name" required>
	<br>
	<label for="type">Pet Type:</label></br>
	<input type="text" name="type" placeholder="For example, Dog" required>
	<br>
	<label for="description">Description:</label></br>
	<input type="text" name="description" required>
	<br><br>
	<input type="submit" value="Add Pet">
</form>
<p>Go back to <a href="index.php">main page</a></p>
</div>

</body>
</html>