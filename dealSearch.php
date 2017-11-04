<form id="myForm" action="search.php" method="post">
<?php
	/*
		num = 0 => normal search
		num = 1 => make offer search
		num = 2 => normal search (already search one time)
		num = 3 => make offer search (already search one time)
	*/
	if (_POST["num"] >= 2) {
		echo '<input type="hidden" name="name" value="'._POST['pname'].'">';
		echo '<input type="hidden" name="owner" value="'._POST['owner'].'">';
		echo '<input type="hidden" name="num" value="3">';
	} else {
		echo '<input type="hidden" name="num" value="1">';
	}

	$takers = filterTakers(_POST['name'], _POST['preference'], _POST['rating']);

	for ($i = 0; $i < count($takers); $i++) {
		$temp = "taker".$i;
		echo '<input type="hidden" name="'.$temp.'" value="'.$takers[$i]->email.'">';
	}
	echo '<input type="hidden" name="numTakers" value="'.count($takers).'">';
?>
	<button type="submit"></button>
</form>
<script type="text/javascript">
	document.getElementById('myForm').submit();
</script>
