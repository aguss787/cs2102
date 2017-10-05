<?php
    include_once __DIR__ . '/baseModel.php';
    include_once __DIR__ . '/../db/dbhandler.php';
    include_once __DIR__ . '/exceptions.php';

    class User extends BaseModel {
        static protected $tableName = "users";
        static protected $fieldName = ["email", "password", "first_name", "last_name", 
                                "address", "contact_number", "activate"];
        static protected $primaryKey = ["email"];

        protected function setValue($fieldName, $value)
        {
            if($fieldName == "password") {
                parent::setValue($fieldName, md5($value));
            } else if($fieldName == "activate") {
                parent::setValue($fieldName, $value ? "true" : "false");
            } else {
                parent::setValue($fieldName, $value);
            }
        }

        public function __get($name) {
            if($name == "full_name") {
                return $this->first_name . " " . $this->last_name;
            } else {
                return parent::__get($name);
            }
        }
    }
?>