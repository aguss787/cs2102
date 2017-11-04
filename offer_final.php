<?php
  session_start();

  include_once __DIR__ . '/controller/userController.php';
  include_once __DIR__ . '/controller/takerController.php';
  include_once __DIR__ . '/controller/petController.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Offer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
	<?php include 'navbar.php' ?>
  <div class="container">
	<div class="center">
		<h1>Offer</h1>
		<form action="make_offer.php" method="post">
    <?php
        $pet = getPet($_POST['owner'], $_POST['name']);
        echo '
  			<h3>Pet information</h3> <!-- read from current pet -->
  			Pet owner: '.$pet->owner.'<br>
  			Pet name: '.$pet->name.'<br>
  			Type: '.$pet->type.'<br>
  			Location: <br>
  			<input type="text" name="location" value="'.$pet->prev_address.'">
  			<br>
        <input type="hidden" name="owner" value="'.$pet->owner.'">
        <input type="hidden" name="pname" value="'.$pet->name.'">
        ';

        $taker = getTaker($_POST['email']);
        $user = getUser($taker->email);
        echo '
  			<h3>Taker information</h3> <!-- read from chosen taker -->
  			Taker name: '.$user->full_name.'<br>
  			Taker contact: '.$user->contact_number.'<br>
  			Taker email: '.$taker->email.'<br>
  			Taker address: '.$user->address.'<br>
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
        <input type="hidden" name="email" value="'.$taker->email.'">
        <input type="submit" value="Offer"> <!-- create new row in offer table -->
        ';
      ?>
		</form>
  </div>
	</div>
</body>
</html>
