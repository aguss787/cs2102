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
        try {
            $user = getUser($email);
        } catch (Exception $e) {
            return false;
        }

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

    function editProfileUser($email, $password, $firstName, $lastName, $address, $contact) {
        $user = getUser($email);
        if(strcmp($user->password, $password) != 0)
            $user->password = $password;
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->address = $address;
        $user->contact_number = $contact;
        $user->save();
    }
?>
