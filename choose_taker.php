<!DOCTYPE html>
<html>
  <head>
    <title>Choose taker</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="choose_taker.css">
  </head>
  <body>
    <main>
      <h1>Choose Taker</h1>
      <?php
        include_once __DIR__ . "/controller/takerController.php";
        include_once __DIR__ . "/controller/userController.php";
        $takers = getAllTakers();
        for ($i = 0; $i < count($takers); $i++) {
          $taker = $takers[$i];
          $user = getUser($taker->email);
          echo "<div class='taker'>";
          echo "<p>Name: " . $user->full_name . "</p>";
          echo "<p class='star'>One star: " . $taker->one_star . "</p>";
          echo "<p class='star'>Two star: " . $taker->two_star . "</p>";
          echo "<p class='star'>Three star: " . $taker->three_star . "</p>";
          echo "<p class='star'>Four star: " . $taker->four_star . "</p>";
          echo "<p class='star'>Five star: " . $taker->five_star . "</p>";
          echo "<p>Preference: " . $taker->preference . "</p> </div>";
        }
      ?>
      <form action="Additional_info.html">
        <input id="submit" type="submit" value="To Additional Info">
      </form>
    </main>
    <script>
      $(".taker").click(function() {
          $(".taker").css('border-color', 'black');
          $(this).css('border-color', 'red');
      });
    </script>
  </body>

</html>
