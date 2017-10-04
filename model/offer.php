<?php
    include_once __DIR__ . '/baseModel.php';
    include_once __DIR__ . '/../db/dbhandler.php';
    include_once __DIR__ . '/exceptions.php';

    class Offer extends BaseModel {
        static protected $tableName = "Offer";
        static protected $fieldName = ["p_owner", "p_name", "t_email",
                                       "offer_start_date", "care_start_date",
                                       "care_end_date", "price", "p_location",
                                       "notice"];
        static protected $primaryKey = ["p_owner", "p_name", "t_email"];
    }
?>