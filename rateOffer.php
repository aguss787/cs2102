<?php
  session_start();
  rateOffer($_SESSION[p_owner], $_SESSION[p_name], $_SESSION[t_email], $_SESSION[rate]);

  header("Location: ./index.php");
  // Since I do not know the url yet
  exit();
?>
