<?php
  session_start();

  include_once __DIR__ . '/controller/userController.php'
  include_once __DIR__ . '/controller/takerController.php'
  include_once __DIR__ . '/controller/petController.php'
?>
<!DOCTYPE html>
<html>
<head>
    <title>Offer</title>
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
		<p class="heading">Offer</p>
		<form action="make_offer.php" method="post">
    <?php 
        $pet = getPet($_POST['owner'], $_POST['pname']);
        echo '
  			<h3>Pet information</h3> <!-- read from current pet -->
  			Pet owner: '.$pet->owner.'<br>
  			Pet name: '.$pet->name.'<br>
  			Type: '.$pet->type.'<br>
  			Location: <br>
  			<input type="text" name="location" value="'.$pet->prev_address.'">
  			<br>
        <input type="hidden" name="owner" value='.$pet->owner.'">
        <input type="hidden" name="pname" value='.$pet->name.'">
        ';
  			
        $taker = getTaker($_POST['email']);
        echo '
  			<h3>Taker information</h3> <!-- read from chosen taker -->
  			Taker name: '.getTakerName($taker).'<br>
  			Taker contact: '.getTakerContact($taker).'<br>
  			Taker email: '.$taker->email.'<br>
  			Taker address: '.getTakerAddress($taker).'<br>
  			Notice: <br>
  			<input type="text" name="notice"  placeholder="Ex: my dog love to eat fish">
  			<br>
  			Price(S$): <br>
  			<input type="number" name="price"  placeholder="99.5" step="0.1">
  			<br>
  			Care start date: <br>
  			<input type="date" name="start_date">
  			<br>
  			Care end date: <br>
  			<input type="date" name="end_date">
  			<br><br>
  			<input type="submit" value="Offer"> <!-- create new row in offer table -->
        <input type="hidden" name="email" value="'.$taker->email.'">
        ';
      ?>
		</form>
	</div>
</body>
</html>