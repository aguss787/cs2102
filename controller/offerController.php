<?php
    include_once __DIR__ . "/../model/offer.php";
    include_once __DIR__ . "/../model/taker.php";
    include_once __DIR__ . "/../model/acceptedOffer.php";
    include_once __DIR__ . "/../model/querySet.php";

    function makeOffer($owner, $pname, $email, $start_date, $end_date,
                       $price, $location, $notice) {
        $offer_date = date("Y-m-d H:i:s");
        Offer::withProperties($owner, $pname, $email, $offer_date, $start_date, $end_date,
                              $price, $location, $notice)->save();
    }

    function getOfferByTaker($email, $limit = NULL) {
        return Offer::findAll("t_email = '$email'", $limit);
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
        $offer = Offer::loadFromDbWithTransaction($db, $p_owner, $p_name, $t_email);
        $offer->delete($db);
    }

    function rejectOffer($p_name, $p_owner, $t_email) {
        deleteOffer($p_name, $p_owner, $t_email);
    }

    function acceptOffer($p_name, $p_owner, $t_email) {
        $db = startTransaction();
        try {
            $offer = Offer::loadFromDbWithTransaction($db, $p_owner, $p_name, $t_email);
            $newOffer = AcceptedOffer::withProperties(
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
            error_log($e);
            rollbackTransaction($db);
        }
    }

    function rateOffer($p_owner, $p_name, $t_email, $date, $rate) {
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

        $db = startTransaction();
        try {
            $offer = AcceptedOffer::loadFromDbWithTransaction($db, $p_owner, $p_name, $t_email, $date);
            $taker = Taker::loadFromDbWithTransaction($db, $t_email);
            $taker->$rate = $taker->$rate + 1;
            $taker->save($db);
            $offer->delete($db);
            commitTransaction($db);
        } catch (Exception $e) {
            rollbackTransaction($db);
        }
    }
?>
