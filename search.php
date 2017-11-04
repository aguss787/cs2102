<?php
	session_start();

	include_once __DIR__ . '/controller/userController.php'
	include_once __DIR__ . '/controller/takerController.php'
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="afterlogin-user.css">
	<style type="text/css">
		table {
    		font-family: arial, sans-serif;
    		border-collapse: collapse;
    		width: 100%;
		}

		td, th {
    		border: 1px solid #dddddd;
    		text-align: left;
    		padding: 8px;
		}
	</style>
</head>
<body>
	<ul>
		<li><a href="#">NAVY</a></li> <!--go to mainpage-->
		<li style="float:right"><a href="index.php">Sign out</a></li>
	</ul>
	<div>
		<p class="heading">Search</p>
			<form action="dealSearch.php" method="post"> <!-- read input and put into table below-->
	  			Name:<br>
	  			<input type="text" name="name" placeholder="Ex: Nguyen Hoai Viet">
	  			<br>
	  			Preference:<br>
	  			<input type="text" name="preference" placeholder="Ex: dog">
	  			<br>
	  			Min Rating:<br>
	  			<input type="number" name="rating"  placeholder="Ex: 3.5" step="0.1" min="1" max="5">
	  			<br><br>
	  			<?php
					/*
						num = 0 => normal search
						num = 1 => make offer search
						num = 2 => normal search (already search one time)
						num = 3 => make offer search (already search one time)
					*/
	  				if (!isset($_POST)) {
							echo '<input type="hidden" name="num" value="0">';
						} else if (!isset($_POST['num'])) {
							echo '<input type="hidden name="num" value="1">';
							echo '<input type="hidden" name="name" value="'.$_POST['name'].'">';
	  					echo '<input type="hidden" name="owner" value='.$_POST['owner'].'">';
						} else if ($_POST['num'] == 3) {
							echo '<input type="hidden" name="num" value="3">';
							echo '<input type="hidden" name="name" value="'.$_POST['name'].'">';
	  					echo '<input type="hidden" name="owner" value='.$_POST['owner'].'">';
						} else {
							echo '<input type="hidden" name="num" value="2">';
						}
	  			?>
	  			<input type="submit" value="Search">
			</form>
		<table>
			<caption style="font-weight: bold; font-size: 20px;">Taker list</caption>
			<thead>
				<tr>
					<th>Taker name</th>
					<th>Taker location</th>
					<th>One star</th>
					<th>Two star</th>
					<th>Three star</th>
					<th>Four star</th>
					<th>Fifth star</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if (!isset($_POST) || ($_POST['num'] < 2)) {
						echo '
							<tr> <!-- loop through the list of taker and write out -->
								<td>N.A</td>  <!-- the name is clickable and when click can get to that taker profile -->
								<td>N.A</td>
								<td>N.A</td>
								<td>N.A</td>
								<td>N.A</td>
								<td>N.A</td>
								<td>N.A</td>
							</tr>
						';
					} else {
						for ($i = 0; $i < $_POST['numTakers']; $i++) {
							$taker = $_POST['taker'.$i];
							$taker_name = getTakerName($taker);
							$taker_location = getTakerLocation($taker);
							$taker_one_star = $taker->one_star;
							$taker_second_star = $taker->two_star;
							$taker_three_star = $taker->three_star;
							$taker_four_star = $taker->four_star;
							$taker_five_star = $taker->five_star;
							if ($_POST['num'] == 2) {
								$temp = '
									<form action="dealClick.php" method="post">
										<input type="hidden" name="email" value="'.$_POST['taker'.$i].'">
										<input type="hidden" name="next" value="0">
										<button type="submit">'.$taker_name.'</button>
									</form>
								';
							} else {
								$temp = '
									<form action="dealClick.php" method="post">
										<input type="hidden" name="email" value="'.$_POST['taker'.$i].'">
										<input type="hidden" name="next" value="1">
										<input type="hidden" name="name" value="'._POST['name'].'">
										<input type="hidden" name="owner" value="'._POST['owner'].'">
										<button type="submit">'.$taker_name.'</button>
									</form>
								'
							}

							echo '
								<tr>
									<td>'.$temp.'</td>
									<td>'.$taker_location.'</td>
									<td>'.$taker_one_star.'</td>
									<td>'.$taker_two_star.'</td>
									<td>'.$taker_three_star.'</td>
									<td>'.$taker_four_star.'</td>
									<td>'.$taker_five_star.'</td>
								</tr>
							';
						}
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
