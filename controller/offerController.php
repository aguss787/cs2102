<?php
    include_once __DIR__ . "/../model/offer.php";
    include_once __DIR__ . "/../model/acceptedOffer.php";

    function getOfferByTaker($email, $limit = NULL) {
        return Offer::findAll("t_email = $email", $limit);
    }

    function getAcceptedOffersByTaker($t_email, $limit = NULL) {
        return AcceptedOffer::findAll("t_email = '$t_email'", $limit);
    }

    function getAcceptedOffersByUser($p_owner, $limit = NULL) {
        return AcceptedOffer::findAll("p_owner = '$p_owner'", $limit);
    }

    function getPendingOffersByTaker($t_email, $limit = NULL) {
        return Offer::findAll("t_email = '$t_email'", $limit);
    }

    function getPendingOffersByUser($p_owner, $limit = NULL) {
        return Offer::findAll("p_owner = '$p_owner'", $limit);
    }

    function rejectOffer($p_name, $p_owner, $t_email) {
        $offer = Offer::loadFromDb($p_name, $p_owner, $t_email);
        $offer.delete();
    }
?>
