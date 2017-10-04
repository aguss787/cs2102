<!DOCTYPE html>
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
            $pets = server.getPets();
            for ($i = 0; $i <= count($pets); $i++) {
              $pet = $pets[$i]
              echo "<option value='" . $pet.name . "'>" . $pet.name . "</option>";
            }
          ?>
        </select>
      </form>

      <form action="choose_taker.html">
        <input id="submit" type="submit" value="To Choose Taker">
      </form>
    </main>
  </body>
</html>
