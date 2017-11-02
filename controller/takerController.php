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

    function isTaker($email) {
        return count(Taker::findAll("email = '$email'")) > 0;
    }

    function filterTakers($name, $pref, $rating, $num = NULL) {
        $sumStar = '(one_star + 2 * two_star + 3 * three_star + 4 * four_star + 5 * five_star)';
        $totalRating = '(one_star + two_star + three_star + four_star + five_star)';
        $res = Taker::getQuerySet()->from("taker, users")
                                   ->select(Taker::$fieldName)
                                   ->filter('taker.email = user.email')
                                   ->filter("(users.first_name || ' ' || users.last_name) LIKE '%$name%'")
                                   ->filter("taker.preference LIKE '%$pref%'")
                                   ->filter("($sumStar / $totalRating) >= $rating")
                                   ->limit($num);

        return Taker::fromQuerySet($res);
    }

    function editProfileTaker($email, $pref) {
        $taker = getTaker($email);
        $taker->preference = $pref;
        $taker->save();
    }
?>
