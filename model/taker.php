<?php
    include_once __DIR__ . '/baseModel.php';
    include_once __DIR__ . '/../db/dbhandler.php';
    include_once __DIR__ . '/exceptions.php';

    class Taker extends BaseModel {
        static protected $tableName = "taker";
        static protected $fieldName = ["email", "preference", "status", 
                                       "one_star", "two_star", "three_star",
                                       "four_star", "five_star"];
        static protected $primaryKey = ["email"];

        protected function setValue($fieldName, $value)
        {
            if($fieldName == strcmp($fieldName, "status")) {
                parent::setValue($fieldName, $value ? "true" : "false");
            } else {
                parent::setValue($fieldName, $value);
            }
        }
    }
?>