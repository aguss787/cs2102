<?php
    include_once __DIR__ . "/../model/taker.php";

    function addTaker($email) {
        $taker = Taker::withProperties($email);
        $taker->save();
        return $taker;
    }

    function getTaker($email) {
        return Taker::loadFromDb($email);
    }

    function getAllTakers() {
        return Taker::findAll("TRUE");
    }

    function getTakers($name, $pref, $num = NULL) {
        $res = Taker::getQuerySet()->from("taker, users")
                                   ->select(Taker::$fieldName);
                                   ->filter('taker.email = user.email')
                                   ->filter("users.first_name || ' ' || users.last_name LIKE '%$name%'")
                                   ->filter("taker.preference LIKE '%$pref%'")
                                   ->limit($num);

        return Taker::fromQuerySet($res);
    }
?>
