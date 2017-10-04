<?php
    include_once __DIR__ . "/../model/user.php";
    include_once __DIR__ . "/takerController.php";

    function getUser($email) {
        return User::loadFromDb($email);
    }

    function signUp($email, $password, $firstName,
                    $lastName, $address, 
                    $contactNumber, $activate) {
        $user = User::withProperties(
            $email, $password, $firstName, $lastName, 
            $address, $contactNumber, $activate
        );

        $user->save();
    }

    function signIn($email, $password) {
        $curUser = User::withProperties($email, $password);
        $user = getUser($email);
        return $curUser->password == $user->password;
    }

    function upgradeToTaker($email) {
        addTaker($email);
    }
?>