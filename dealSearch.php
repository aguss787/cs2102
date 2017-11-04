<form id="myForm" action="search.php" method="post">
<?php
	include_once __DIR__ . '/controller/takerController.php';
	/*
		num = 0 => normal search
		num = 1 => make offer search
		num = 2 => normal search (already search one time)
		num = 3 => make offer search (already search one time)
	*/
	if ($_POST["num"] == 1) {
		echo '<input type="hidden" name="name" value="'.$_POST['name'].'">';
		echo '<input type="hidden" name="owner" value="'.$_POST['owner'].'">';
		echo '<input type="hidden" name="num" value="1">';
	} else {
		echo '<input type="hidden" name="num" value="0">';
	}

	$takers = filterTakers($_POST['q_name'], $_POST['q_preference'], $_POST['q_rating']);

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
