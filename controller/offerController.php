<?php
    include_once __DIR__ . "/../model/offer.php";

    function getOfferByTaker($email, $limit = NULL) {
        return Offer::findAll("t_email = $email", $limit);
    }

?>
