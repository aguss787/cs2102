<?php
    class QueryError extends Exception {

    }

    class DbHandler {
        private $dbConnection;
        function __construct() {
            $this->dbConnection = pg_connect(
                "host=localhost " .
                "port=5432 " .
                "dbname=pet_taker " .
                "user=postgres " .
                "password=projectgroup3"
            );
        }

        function runQuery($query) {
            $queryResult = pg_query($this->dbConnection, $query);

            if (!$queryResult) {
                throw new QueryError();
            }

            $result = array();

            while ($data = pg_fetch_object($queryResult)) {
                array_push($result, $data);
            }

            pg_free_result($qu);

            return $queryResult;
        }
    }
?>