<?php
    session_start();
    $logged_in = isset($_SESSION['email']);
	
    if($logged_in) {
        header('Location:./mainpage.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Navy</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<?php include 'navbar.php';?>

<div class="container">
<div class="index">
<h1 style="text-align: center; font-size: 80px;">WELCOME</h1>
<h2 style="text-align: center; font-size: 50px;">TO</h2>
<h1 style="text-align: center; font-size: 80px;">NAVY</h1>
<br>
<h3 style="text-align: center; font-weight: bold;">We Want To Help Your Pet</h3>
<h4 style="text-align: center;">The website to find care taker for your pet when you are busy</h4>
</div>
</div>
</body>
</html>
