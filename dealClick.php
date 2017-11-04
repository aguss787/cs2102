<?php
	if (_POST["next"] == 0) {
		echo '
			<form id="myForm" action="profile.php" method="get">
				<input type="hidden" name="email" value="'._POST['email'].'">
				<button type="submit"></button>
			</form>	
		';
	} else {
		echo '
			<form id="myForm" action="offer_final.php" method="post">
				<input type="hidden" name="email" value="'._POST['email'].'">
				<input type="hidden" name="name" value="'._POST['pname'].'">
				<input type="hidden" name="owner" value="'._POST['owner'].'">
				<button type="submit"></button>
			</form>	
		';
	}
?>
<script type="text/javascript">
	document.getElementById('myForm').submit();
</script>
