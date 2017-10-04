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
            if($fieldName == strcmp($fieldName, "password")) {
                parent::setValue($fieldName, md5($value));
            } else {
                parent::setValue($fieldName, $value);
            }
        }
    }
?>