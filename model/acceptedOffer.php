<?php
    include_once __DIR__ . '/baseModel.php';
    include_once __DIR__ . '/../db/dbhandler.php';
    include_once __DIR__ . '/exceptions.php';

    class AcceptedOffer extends BaseModel {
        static protected $tableName = "accepted_offer";
        static protected $fieldName = ["p_owner", "p_name", "t_email", 
                                       "care_start_date", "care_end_date"];
        static protected $primaryKey = ["p_owner", "p_name", "t_email", 
                                       "care_start_date"];
    }
?>