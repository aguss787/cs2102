<?php
    include_once __DIR__ . "/../model/pet.php";

    function getPet($owner, $name) {
        return Pet::loadFromDb($owner, $name);
    }

    function addPet($owner, $name, $type, $description, $prev_address,
                    $prev_contact_number) {
        $pet = Pet::withProperties(
            $owner, $name, $type, $description, $prev_address,
            $prev_contact_number
        );

        $pet->save();
    }

    function getPetsWithOwner($owner) {
        return Pet::findAll("owner = '$owner'");
    }

    function editPet($owner, $name, $type, $description, $address, $contact) {
        $pet = getPet($owner, $name);
        $pet->type = $type;
        $pet->description = $description;
        $pet->prev_address = $address;
        $pet->prev_contact_number = $contact;
        $pet->save();
    }
?>
