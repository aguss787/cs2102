<?php
    include_once __DIR__ . "/../config.php";

    class QueryError extends Exception {

    }

    class DbHandler {
        private $dbConnection;
        function __construct() {
            $host = DbConfig::$host;
            $port = DbConfig::$port;
            $db = DbConfig::$db;
            $user = DbConfig::$user;
            $pass = DbConfig::$pass;

            $this->dbConnection = pg_connect(
                "host=$host " .
                "port=$port " .
                "dbname=$db " .
                "user=$user " .
                "password=$pass "
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

            pg_free_result($queryResult);

            return $result;
        }
    }
?>