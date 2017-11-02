<?php
include_once __DIR__ . '/controller/userController.php';
include_once __DIR__ . '/controller/takerController.php';

echo "<ul>";
if (!isset($_SESSION['email']) {
	echo '<li><a href="index.php">NAVY</a></li>';
	echo '<li style="float:right"><a href="sign_in.php">Sign In</a></li>';
	echo '<li style="float:right"><a href="sign_up.php">Sign Up</a></li>';
} else {
	echo '<li><a href="mainpage.php">NAVY</a></li>';
	if (!isTaker($_SESSION['email'])){
		echo '<li id="betaker" style="float:right">Be Taker</li>';
	}
	echo '<li style="float:right"><a href="profile.php">Profile</a></li>';
	echo '<li style="float:right"><a href="search.php">Search</a></li>';
	echo '<li id="signout" style="float:right">Sign Out</li>';
}
echo "</ul>";
?>
<script>
// STILL ERROR, STILL TRYING TO FIND OUT HOW TO PUT PHP CODE INSIDE JAVASCRIPT
// KNOW HOW TO USE AJAX?
document.getElementById("betaker").onclick = function() {beTaker()};
function beTaker() {
	<?php upgradeToTaker($sessionEmail); ?>
	window.location.href="profile.php";
}

document.getElementById("signout").onclick = function() {signOut()};
function signOut() {
	<?php session_unset();?>
	window.location.href="index.php";
}
</script>