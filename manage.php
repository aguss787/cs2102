<?php
    session_start();
    if ($_POST["choice"] == 0) {
        acceptOffer($_POST["p_name"], $_POST["p_owner"], $_POST["t_email"]);
    } else {
        rejectOffer($_POST["p_name"], $_POST["p_owner"], $_POST["t_email"]);
    }
    header("Location: ".$_SESSION["previous_url"]);
    // Since I do not know the url yet
    exit();
?>
