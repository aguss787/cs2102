<?php
	class DbHandler {
		private $db;
		// $result = pg_query($db, "SELECT * FROM book where book_id = '$_POST[bookid]'");
		// $row = pg_fetch_assoc($result);
		function __construct() {
			$db = pg_connect(
				"host=localhost" .
				"port=5432" .
				"dbname=public" .
				"user=postgres" .
				"password=projectgroup3"
			);
			echo "ASD";	
		}
	}

	$test = new DbHandler();
?>