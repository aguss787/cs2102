<!DOCTYPE html>
<html>
	<head>
		<title>Home page</title>
		<style type="text/css">
		.welcome_word{
			text-align: center;
		}
		h2{
			text-align: center;
		}
		#statement{
			font-weight: bold;
		}
		a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
    	}		
    	#signin{
    		position: absolute;
   			right: 80px;
    	}
    	#signup{
    		position: absolute;
    		right: 10px;
    	}
    	#name{
    		left:0px;
    		width: 100px;
    	}
		</style>
	</head>
	<body>
		<div id="headbar">
		<!--NAVY | Sign in | Sign up -->
			<h3 id="name">NAVY</h3>
			<div id="buttons">
				<a href="#" class="button" id="signin">Sign in</a> <!-- add link to sign in and sign up-->
				<a href="#" class="button" id="signup">Sign up</a>
			</div>
		</div>
		<hr/>
		<div id="welcome">
			<h1 class="welcome_word">WELCOME</h1>
			<h1 class="welcome_word">TO</h1>
			<h1 class="welcome_word">NAVY</h1>
		</div>
		<hr/>
		<div>
			<h2 id="statement">We Want To Help Your Pet</h2>
			<h2>The website to find care taker for your pet when you are busy</h2>
		</div>
	</body>
</html>