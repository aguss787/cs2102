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
		<form action="#">
  			<h3>Pet information</h3> <!-- read from current pet -->
  			Pet owner: <br>
  			Pet name: <br>
  			Type: <br>
  			Location: <br>
  			<input type="text" name="preference" value="Default Address">
  			<br>
  			Contact: <br>
  			<input type="text" name="contact" value="Default Contact">
  			<br>
  			
  			<h3>Taker information</h3> <!-- read from chosen taker -->
  			Taker name: <br>
  			Taker contact: <br>
  			Taker email: <br>
  			Taker address: <br>
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
		</form>
	</div>
</body>
</html>