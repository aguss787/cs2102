<?php
    include_once __DIR__ . '/../db/dbhandler.php';

    class InvalidSqlSetup extends Exception {

    }

    class QuerySet {
        public static $SELECT = "SELECT";
        public static $DELETE = "DELETE";
        public static $INSERT = "INSERT";
        public static $UPDATE = "UPDATE";

        protected $operation;
        protected $tableName;
        protected $select;
        protected $where;
        protected $groupby;
        protected $having;
        protected $orderby;
        protected $fieldName;
        protected $values;
        protected $limit;

        function __construct() {
            $this->operation = NULL;
            $this->tableName = NULL;
            $this->select = [];
            $this->where = [];
            $this->groupby = [];
            $this->having = [];
            $this->orderby = [];
            $this->fieldName = NULL;
            $this->values = NULL;
            $this->limit = NULL;
        }

        public function from($table) {
            $this->tableName = $table;
            return $this;
        }

        public function into($table) {
            return $this->from($table);
        }

        public function select($clause = "*") {
            $this->operation = static::$SELECT;
            if(is_array($clause)) {
                foreach ($clause as $x) {
                    array_push($this->select, $x);
                }
            } else {
                array_push($this->select, $clause);
            }
            return $this;
        }

        public function delete() {
            $this->operation = static::$DELETE;
            return $this;
        }

        public function update($fieldName, $values) {
            $this->fieldName = $fieldName;
            $this->values = $values;
            $this->operation = static::$UPDATE;
            return $this;
        }

        public function insert($fieldName, $values) {
            $this->fieldName = $fieldName;
            $this->values = $values;
            $this->operation = static::$INSERT;
            return $this;
        }

        public function insertValues($values) {
            $this->fieldName = NULL;
            $this->values = $values;
            $this->operation = static::$INSERT;
            return $this;
        }

        public static function sqlAnd(...$args) {
            return static::concate($args, " AND");
        }

        public static function sqlOr(...$args) {
            return static::concate($args, " OR");
        }

        public function filter($clause) {
            array_push($this->where, $clause);
            return $this;
        }

        public function where($clause) {
            return $this->filter($clause);
        }

        public function groupby($clause) {
            array_push($this->groupby, $clause);
            return $this;
        }

        public function having($clause) {
            array_push($this->having, $clause);
            return $this;
        }

        public function asc($colName) {
            array_push($this->orderby, $colName . " ASC");
            return $this;
        }

        public function desc($colName) {
            array_push($this->orderby, $colName . " DESC");
            return $this;
        }

        public function limit($clause) {
            $this->limit = $clause;
            return $this;
        }

        public static function concate($arr, $join = ",") {
            $len = 0;
            $res = "";
            foreach($arr as $x) {
                if($len > 0)$res = $res . $join;
                $len = $len + 1;
                $res = $res . " " . $x;
            }
            return $res;
        }

        public function getSqlStatement() {
            if(is_null($this->tableName))
                throw new InvalidSqlSetup("Table is not selected");
            if(is_null($this->operation))
                throw new InvalidSqlSetup("Operation is not selected");

            $sql = $this->operation . " ";
            $len = count($this->select);

            if(strcmp($this->operation, static::$SELECT) == 0) {
                $sql = $sql . static::concate($this->select);
                $sql = $sql . " FROM " . $this->tableName;
            } else if (strcmp($this->operation, static::$DELETE) == 0) {
                $sql = $sql . " FROM " . $this->tableName;
            } else if (strcmp($this->operation, static::$UPDATE) == 0) {
                if(is_null($this->values) || is_null($this->fieldName))
                    throw new InvalidSqlSetup("values or fieldname is null");
                if(count($this->values) != count($this->fieldName))
                    throw new InvalidSqlSetup("values - fieldname count mismatch");
                $len = count($this->values);
                $sql = $sql . $this->tableName;
                $sql = $sql . " SET ";

                for($i = 0; $i < $len ; $i ++) {
                    $sql = $sql . " " . $this->fieldName[$i] . " = " . static::pad($this->values[$i]);
                }
            } else if (strcmp($this->operation, static::$INSERT) == 0) {
                if(is_null($this->values))
                    throw new InvalidSqlSetup("values is null");
                $sql = $sql . " INTO " . $this->tableName;
                if(!is_null($this->fieldName)) {
                    if(count($this->values) != count($this->fieldName))
                        throw new InvalidSqlSetup("values - fieldname count mismatch");
                    $sql = $sql . " (" . static::concate($this->fieldName) . ")";
                }
                $sql = $sql . " VALUES ";
                $tmp = [];
                foreach($this->values as $x) {
                    array_push($tmp, static::pad($x));
                }
                $sql = $sql . " (" . static::concate($tmp) . ")";
            }


            if(count($this->where) > 0) {
                $sql = $sql . " WHERE (";
                $sql = $sql . static::concate($this->where, " AND");
                $sql = $sql . ") ";
            }

            if(count($this->groupby) > 0) {
                $sql = $sql . " GROUP BY ";
                $sql = $sql . static::concate($this->groupby);
            }

            if(count($this->having) > 0) {
                $sql = $sql . " HAVING (";
                $sql = $sql . static::concate($this->having, " AND");
                $sql = $sql . ") ";
            }

            if(count($this->orderby) > 0) {
                $sql = $sql . " ORDER BY ";
                $sql = $sql . static::concate($this->orderby);
            }

            if(!is_null($this->limit)) {
                $sql = $sql . " LIMIT " . $this->limit;
            }

            $sql = $sql . ";";

            return $sql;
        }

        public function eval($db = NULL) {
            if(is_null($db))
                $db = new DbHandler();
            return $db->runQuery($this->getSqlStatement());
        }

        public static function pad($val) {
            if(is_null($val)) return "NULL";
            return "'" . $val . "'";
        }
    }

    function transaction(...$querySets) {
        $db = new DbHandler();
        $db->runQuery("BEGIN");
        foreach ($querySets as $q) {
            $q->eval($db);
        }
        $db->runQuery("COMMIT");
    }
?>
