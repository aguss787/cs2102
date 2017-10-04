<?php
    include_once __DIR__ . '/baseModel.php';
    include_once __DIR__ . '/../db/dbhandler.php';
    include_once __DIR__ . '/exceptions.php';

    class Pet extends BaseModel {
        static protected $tableName = "pet";
        static protected $fieldName = ["owner", "name", "type", "description",
                                       "prev_address", "prev_contact_number"];
        static protected $primaryKey = ["owner", "name"];
    }
?>