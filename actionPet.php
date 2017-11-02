<?php
  session_start();
  if (_POST["choice"] == 0) {
    //edit
    header("Location: ".$_SESSION["edit_pet_url"]);
    exit();
  } elseif (_POST["choice"] == 1) {
    //delete
    //may need to alert first
    deletePet();
    exit();
  } else {
    //make offer

    header("Location: ".$_SESSION["make_offer"]);
    exit();
  }
?>
