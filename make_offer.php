<?php

	include_once __DIR__ . '/controller/offerController.php'
	date_default_timezone_set('Singapore');
	$date = $date('dd/mm/yyyy', time());
	makeOffer(_POST["owner"], _POST["pname"], _POST["email"], $date, _POST["start_date"],
		_POST["end_date"], _POST["price"], _POST["location"], _POST["notice"]);

	header("Location: ./mainpage.php");
  	exit();
?>