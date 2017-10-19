<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="homepage.css">
</head>
<body>
    <ul>
	  <li><a href="index.php">NAVY</a></li>
	  <li style="float:right"><a href="sign_in.php">Sign in</a></li>
	  <li style="float:right"><a href="sign_up.php">Sign up</a></li>
	</ul>	
<div>
	<p class="heading">Sign In</p>

<!--if user is not a taker then go to mainpage-user.php, otherwise go to mainpage-taker.php-->
<!--put the link here-->

<form action="" autocomplete="on" method="post">
	<label for="email">Email:</label></br>
	<input type="email" name="email" required>
	<br>
	<label for="password">Password:</label></br>
	<input type="password" name="password" required>
	<br><br>
	<input type="submit" value="Sign In"> 
</form>
	<p>Don't have an account? <a href="sign_up.php">Sign up here</a></p>
</div>
</body>
</html>