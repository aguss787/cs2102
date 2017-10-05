<!DOCTYPE html>

<?php
    session_start();
    $loged_in = isset($_SESSION['email']);
    $email = "";
    if(!$loged_in) {
        header('Location:./index.php');
    }
    $email = $_SESSION['email'];
?>

<html>
  <head>
    <title>Choose pet</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="choose_pet.css">
  </head>
  <body>
    <main>
      <h1>Choose Pet</h1>
      <form action="choose_taker.php" method="POST">
        <select name="p_name">
          <?php
            include_once __DIR__ . "/controller/petController.php";
            if($loged_in){
              $pets = getPetsWithOwner($email);
              for ($i = 0; $i < count($pets); $i++) {
                $pet = $pets[$i];
                echo "<option value='" . $pet->name . "'>" . $pet->name . "</option>";
              }
            }
          ?>
        </select>
        <input id="submit" type="submit" value="To Choose Taker">
      </form>

    </main>
  </body>
</html>
