<?php
    include __DIR__ . "/../model/user.php";

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
        return $curUser->getPassword() == $user->getPassword();
    }
?>