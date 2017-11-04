<?php
	include_once __DIR__ . '/controller/userController.php';
	include_once __DIR__ . '/controller/takerController.php';

	$logged_in = isset($_SESSION['email']);

	//
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && $logged_in) {
		if	($_POST['betaker'] === "yes") {
			upgradeToTaker($_SESSION['email']);
			header('Location:./profile.php');
		}
	}

	echo "<ul>";
	if (!$logged_in) {
		echo '<li><a href="index.php">NAVY</a></li>';
		echo '<li style="float:right"><a href="sign_in.php">Sign In</a></li>';
		echo '<li style="float:right"><a href="sign_up.php">Sign Up</a></li>';
	} else {
		echo '<li><a href="mainpage.php">NAVY</a></li>';
		if (!isTaker($_SESSION['email'])){
			echo '<li style="float:right">';
			echo	'<form action="navbar.php" method="post">';
			echo		'<input type="hidden" name="email" value="' . $_SESSION['email'] . '">';
			echo		'<input type="submit" value="Be Taker">';
			echo	'</form>';
			echo '</li>';
		}
		echo '<li style="float:right"><a href="profile.php">Profile</a></li>';
		echo '<li style="float:right"><a href="search.php">Search</a></li>';
		echo '<li style="float:right"><a href="sign_out.php">Sign Out</a></li>';

		/*
			if (!isTaker($_SESSION['email'])) {
				echo '<li style="float:right">';
				echo	'<form action="navbar.php" method="post">';
				echo		'<input type="hidden" name="email" value="' . $_SESSION['email'] . '">';
				echo 		'<input type="hidden" name="betaker" value="yes">';
				echo		'<input type="submit" value="Be Taker">';
				echo	'</form>';
				echo '</li>';
			}
		}
		*/
		// alert?
		echo '<li style="float:right">';
		echo	'<form action="navbar.php" method="post">';
		echo		'<input type="hidden" name="betaker" value="yes">';
		echo		'<input type="submit" value="Be Taker">';
		echo	'</form>';
		echo '</li>';
	}
	echo "</ul>";
?>
