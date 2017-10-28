<?php
/* TEMPORARY UNIVERSAL NAVIGATION BAR */

echo 
'<ul>
	<li style="color:grey;">This is a temporary universal navbar</li>
	<li><a href="index.php">Index</a></li>
	<li><a href="sign_in.php">Sign In</a></li>
	<li><a href="sign_up.php">Sign Up</a></li>
	<li><a href="mainpage.php">Mainpage</a></li>
	<li><a href="profile_normaluser.php">Profile Normal</a></li>
	<li><a href="profile_taker.php">Profile Taker</a></li>
	<li><a href="add_pet.php">Add Pet</a></li>
	<li><a href="edit_pet.php">Edit Pet</a></li>
</ul>';

/*-----------------------------------------
if user is not logged in {
	
} else {
    if user is not taker {
		
	} else {
		
	}
}
-----------------------------------------*/
echo "<ul>";
if (true) {
	echo '<li><a href="index.php">NAVY</a></li>
	<li style="float:right"><a href="sign_in.php">Sign In</a></li>
	<li style="float:right"><a href="sign_up.php">Sign Up</a></li>';
} else {
	if (true){
		echo '<li><a href="mainpage.php">NAVY</a></li>
		<li style="float:right"><a href="">Be Taker</a></li>
		<li style="float:right"><a href="profile_normaluser.php">Profile</a></li>';
	} else {
		echo '<li><a href="">NAVY</a></li>
		<li style="float:right"><a href="profile_taker.php">Profile</a></li>';
	}
	echo '<li style="float:right"><a href="">Search</a></li>
	<li style="float:right"><a href="">Sign Out</a></li>';
}
echo "</ul>";
?>