<?php
    class SessionNotSet extends Exception {}

    include_once __DIR__ . "/../model/user.php";
    include_once __DIR__ . "/takerController.php";

    function getUser($email) {
        return User::loadFromDb($email);
    }

    function getCurrentUser() {
        if(!isset($_SESSION))
            throw new SessionNotSet();

        if(!isset($_SESSION['email']))
            return NULL;

        return getUser($_SESSION['email']);
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
        if(!isset($_SESSION))
            throw new SessionNotSet();
        $curUser = User::withProperties($email, $password);
        $user = getUser($email);
        if ($curUser->password == $user->password) {
            $_SESSION['email'] = $user->email;
            return true;
        } else {
            return false;
        }
    }

    function signOut() {
        unset($_SESSION['email']);
    }

    function upgradeToTaker($email) {
        addTaker($email);
    }
?>
