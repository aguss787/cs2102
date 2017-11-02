<?php
    include_once __DIR__ . '/querySet.php';
    include_once __DIR__ . '/exceptions.php';

    class BaseModel {
        static protected $tableName;
        static protected $fieldName;
        static protected $primaryKey;

        protected $value;

        protected $db;
        protected $rawData;

        protected function __construct($db = NULL, $rawData = NULL) {
            if(is_null($db)){
                $this->db = new DbHandler();
            } else {
                $this->db = $db;
            }
            $this->rawData = $rawData;

            foreach(static::$fieldName as $fieldName) {
                $this->value[$fieldName] = NULL;
            }
        }

        public static function withProperties(...$args) {
            return static::withPropertiesArray($args);
        }

        public static function withPropertiesArray($args) {
            $user = new static();

            $len = min(count($args), count(static::$fieldName));
            for($i = 0 ; $i < $len ; $i ++) {
                $fieldName = static::$fieldName[$i];
                $user->$fieldName = $args[$i];
            }
            return $user;
        }

        private function InnerLoadFromDb($args, $db = NULL) {
            $whereClause = $this->getWhereClause($args);
            $tableName = static::$tableName;

            $result = $this->getQuerySet()->select()->filter($whereClause)->eval($db);

            if(count($result) == 0) {
                throw new RecordNotFound();
            }

            $rawData = $result[0];
            $this->loadFromRawData($rawData);
        }

        public function loadFromRawData($rawData) {
            $this->rawData = $rawData;

            $len = count(static::$fieldName);
            for($i = 0 ; $i < $len ; $i ++) {
                $fieldName = static::$fieldName[$i];
                self::setValue($fieldName, $rawData->$fieldName);
            }
        }

        public static function LoadFromDb(...$args) {
            $user = new static();
            $user->InnerLoadFromDb($args);
            return $user;
        }

        public static function loadFromDbWithTransaction($db, ...$args) {
            $user = new static();
            $user->InnerLoadFromDb($args, $db);
            return $user;
        }

        public function save($db = NULL) {
            $tableName = static::$tableName;

            if($this->isNew()) {
                $this->getQuerySet()->insertValues($this->getValues())->eval($db);
            } else {
                $pk = $this->getPrimaryKeyValue();
                $whereClause = $this->getWhereClause($pk);
                $this->getQuerySet()->update(static::$fieldName, $this->getValues())->where($whereClause)->eval($db);
            }
        }

        public function delete($db = NULL) {
            $db = $this->db;
            $tableName = static::$tableName;

            if($this->isNew()) {
                throw new RecordNotFound();
            } else {
                $pk = $this->getPrimaryKeyValue();
                $whereClause = $this->getWhereClause($pk);
                $this->getQuerySet()->delete()->where($whereClause)->eval($db);
            }
        }

        public static function findAll($whereClause, $limit = NULL, $db = NULL) {
            $tableName = static::$tableName;
            $result = $this->getQuerySet()->select()->filter($whereClause)->limit($limit)->eval($db);

            $ret = [];
            foreach ($result as $rawData) {
                $cur = new static();
                $cur->loadFromRawData($rawData);
                array_push($ret, $cur);
            }
            return $ret;
        }

        public static function fromQuerySet($queryset, $db = NULL) {
            $result = $queryset->eval($db);
            $ret = [];
            foreach ($result as $rawData) {
                $cur = new static();
                $cur->loadFromRawData($rawData);
                array_push($ret, $cur);
            }
            return $ret;
        }

        private function pad($val) {
            if(is_null($val)) return "NULL";
            return "'" . $val . "'";
        }

        private function getUpdateSetClause() {
            $result = "";
            $len = 0;
            foreach(static::$fieldName as $fieldName) {
                if($len > 0) $result = $result . ", ";
                $len ++;
                $result = $result . $fieldName . " = " .
                          $this->pad($this->$fieldName);
            }
            return $result;
        }

        private function getPrimaryKeyValue() {
            $result = [];
            foreach(static::$primaryKey as $pk) {
                array_push($result, $this->rawData->$pk);
            }
            return $result;
        }

        private function getConcatedValue() {
            $result = "";
            $len = 0;
            foreach(static::$fieldName as $fieldName) {
                if($len > 0) $result = $result . ", ";
                $len ++;
                $result = $result . $this->pad($this->$fieldName);
            }
            return $result;
        }

        private function getValues() {
            $result = [];
            foreach(static::$fieldName as $fieldName) {
                array_push($result, $this->$fieldName);
            }
            return $result;
        }

        private function getWhereClause($args) {
            if(count($args) != count(static::$primaryKey))
                throw new AttributesDoNotMatch();
            $result = "";
            $len = count($args);
            $cntr = 0;
            for($i = 0 ; $i < $len ; $i ++) {
                if($cntr > 0) $result = $result . " AND ";
                $cntr ++;
                $result = $result . static::$primaryKey[$i] .
                          " = '" . $args[$i] . "' ";
            }
            return $result;
        }

        protected function setValue($fieldName, $value) {
            $this->value[$fieldName] = $value;
        }

        public function __set($fieldName, $value)
        {
            if(in_array($fieldName, static::$fieldName)) {
                $this->setValue($fieldName, $value);
            } else {
                throw new AttributeDoesNotExist();
            }
        }

        protected function getValue($fieldName) {
            return $this->value[$fieldName];
        }

        public function __get($fieldName)
        {
            if(in_array($fieldName, static::$fieldName)) {
                return $this->getValue($fieldName);
            } else {
                throw new AttributeDoesNotExist();
            }
        }

        public function isNew() {
            return is_null($this->rawData);
        }

        public static function getQuerySet() {
            return (new QuerySet())->from(static::$tableName);
        }
    }
?>
