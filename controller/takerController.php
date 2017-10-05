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
?>