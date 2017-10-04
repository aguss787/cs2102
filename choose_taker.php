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
        $takers = server.getTakers();
        for ($i = 0; $i < count($takers); i++) {
          $taker = $takers[$i];
          echo "<div class='taker'>";
          echo "<p>Name: " . $taker.getName() . "</p>";
          echo "<p class='star'>One star: " . $taker.getOneStar() . "</p>";
          echo "<p class='star'>Two star: " . $taker.getTwoStar() . "</p>";
          echo "<p class='star'>Three star: " . $taker.getThreeStar() . "</p>";
          echo "<p class='star'>Four star: " . $taker.getFourStar() . "</p>";
          echo "<p class='star'>Five star: " . $taker.getFiveStar() . "</p>";
          echo "<p>Preference: " . $taker.getPreference() . "</p> </div>";
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
