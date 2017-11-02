<?php
    include_once __DIR__ . "/../model/offer.php";
    include_once __DIR__ . "/../model/taker.php";
    include_once __DIR__ . "/../model/acceptedOffer.php";
    include_once __DIR__ . "/../model/querySet.php";

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

    function deleteOffer($p_name, $p_owner, $t_email, $db = NULL) {
        $offer = Offer::loadFromDb($p_name, $p_owner, $t_email);
        $offer.delete($db);
    }

    function rejectOffer($p_name, $p_owner, $t_email) {
        deleteOffer($p_name, $p_owner, $t_email);
    }

    function acceptOffer($p_name, $p_owner, $t_email) {
        $db = startTransaction();
        try {
            $offer = Offer::loadFromDbWithTransaction($p_name, $p_owner, $t_email);
            $newOffer = AcceptOffer::withProperties(
                $offer->p_owner,
                $offer->p_name,
                $offer->t_email,
                $offer->care_start_date,
                $offer->care_end_date
            );
            $newOffer->save($db);
            deleteOffer($p_name, $p_owner, $t_email, $db);
            commitTransaction($db);
        } catch (Exception $e) {
            rollbackTransaction($db);
        }
    }

    function rateOffer($p_owner, $p_name, $t_email, $rate) {
        if($rate == 1) {
            $rate = 'one';
        } else if($rate == 2) {
            $rate = 'two';
        } else if($rate == 3) {
            $rate = 'three';
        } else if($rate == 4) {
            $rate = 'four';
        } else if($rate == 5) {
            $rate = 'five';
        }

        $rate = $rate . '_star';

        $db = beginTransaction();
        try {
            $offer = AcceptedOffer::loadFromDbWithTransaction($p_name, $p_owner, $t_email);
            $taker = Taker::loadFromDbWithTransaction($t_email, $db);
            $taker->$rate = $taker->$rate + 1;
            $taker->save($db);
            $offer->delete($db);
            commitTransaction($db);
        } catch (Exception $e) {
            rollbackTransaction($db);
        }
    }
?>
