<?php
    session_start();

    $logged_in = isset($_SESSION['email']);
?>

<?php
	include_once __DIR__ . '/controller/userController.php';
	include_once __DIR__ . '/controller/takerController.php';

	$logged_in = isset($_SESSION['email']);

	echo "<ul>";
	if (!$logged_in) {
		echo '<li><a href="index.php">NAVY</a></li>';
		echo '<li style="float:right"><a href="sign_in.php">Sign In</a></li>';
		echo '<li style="float:right"><a href="sign_up.php">Sign Up</a></li>';
	} else {
		echo '<li><a href="mainpage.php">NAVY</a></li>';
		echo '<li style="float:right"><a href="sign_out.php">Sign Out</a></li>';
		echo '<li style="float:right"><a href="search.php">Search</a></li>';
		echo '<li style="float:right"><a href="profile.php">Profile</a></li>';
		if($logged_in and !isTaker($_SESSION['email']))
			echo '<li style="float:right"><a href="betaker.php">Be a Taker</a></li>';
	}
	echo "</ul>";
?>
