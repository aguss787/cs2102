<?php
  session_start();
  include_once __DIR__ . "/controller/userController.php";
  include_once __DIR__ . "/controller/petController.php";
  include_once __DIR__ . "/controller/offerController.php";
  include_once __DIR__ . "/controller/takerController.php";
  include_once __DIR__ . "/router.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Mainpage</title>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="stylesheet.css">
  </head>

  <body>
    <?php include 'navbar.php'; ?>


<?php
  if (isTaker($_SESSION['email'])) {
    echo '
    <section id="taker">
      <section id="taker-offer">
        <table>
          <thead>
            <tr class="header-status">
              <th class="left top right" colspan="8">Manage Offer</th>
            </tr>
            <tr class="top">
              <th class="left taker-pet">Pet</th>
              <th class="taker-user">User</th>
              <th class="taker-start-date">Care start date</th>
              <th class="taker-end-date">Care end date</th>
              <th class="taker-price">Price</th>
              <th class="taker-location">Location</th>
              <th class="right taker-action" colspan="2">Action</th>
            </tr>
          </thead>

          <tbody>
          ';

    $offers = getPendingOffersByTaker($_SESSION["email"]);

    for ($x = 0; $x < count($offers); $x++) {
      $p_name = $offers[$x]->p_name;
      $p_owner = $offers[$x]->p_owner;
      $t_email = $offers[$x]->t_email;
      $care_start_date = $offers[$x]->care_start_date;
      $care_end_date = $offers[$x]->care_end_date;
      $price = $offers[$x]->price;
      $p_location = $offers[$x]->p_location;
      $key_info =
        "<input type='hidden' name='p_name' value='".$p_name."'>
        <input type='hidden' name='p_owner' value='".$p_owner."'>
        <input type='hidden' name='t_email' value='".$t_email."'";
      echo "<tr>
              <td class='left taker-pet'>".$p_name."</td>
              <td class='taker-user'>".$p_owner."</td>
              <td class='taker-start-date'>".$care_start_date."</td>
              <td class='taker-end-date'>".$care_end_date."</td>
              <td class='taker-price'>".$price."</td>
              <td class='taker-location'>".$p_location."</td>
              <td class='taker-accept'>
                <form action='". $_ROUTER['acc_offer'] ."' method='post'>
                  <input type='hidden' name='choice' value='0'>"
                  .$key_info.">
                  <button type='submit' class='btn-link'>Accept</button>
                </form>
              </td>
              <td class='right taker-reject'>
                <form action='". $_ROUTER['delete_offer'] ."' method='post'>
                  <input type='hidden' name='choice' value='1'>"
                  .$key_info.">
                  <button type='submit' class='btn-link'>Reject</button>
                </form>
              </td>
            </tr>";
    }
    echo '
          </tbody>
        </table>
      </section>

      <section id="pend-offer">
        <table>
          <thead>
            <tr class="header-status">
              <th class="left top right"colspan="7">Unrated Offer(Taker)</th>
            </tr>
            <tr>
              <th class="left pend-pet">Pet</th>
              <th class="pend-taker">Name</th>
              <th class="pend-start-date">Care start date</th>
              <th class="pend-end-date">Care end date</th>
            </tr>
          </thead>
          <tbody>';
              // <th class="right"></th>
      $offers = getAcceptedOffersByTaker($_SESSION["email"]);
      for ($x = 0; $x < count($offers); $x++) {
        $p_name = $offers[$x]->p_name;
        $p_owner = $offers[$x]->p_owner;
        $t_email = $offers[$x]->t_email;
        $care_start_date = $offers[$x]->care_start_date;
        $care_end_date = $offers[$x]->care_end_date;

        echo "
          <tr>
            <td class='left pend-pet'>".$p_name."</td>
            <td class='pend-taker'>".$p_owner."</td>
            <td class='pend-start-date'>".$care_start_date."</td>
            <td class='pend-end-date'>".$care_end_date."</td>
          </td>
        ";
            // <td class='btn-delete right'>Del</td>
      }
      echo '
          </tbody>
        </table>
      </section>
    </section>';
  }
?>
    <section id="pet">
      <table>
        <thead>
          <tr class="header-status">
            <th class="left top pet" colspan="3">Pet</th>
            <th class="right top add" colspan="3"><a href="<?php echo $_ROUTER['add_pet']; ?>">Add</a></th>
          </tr>
          <tr>
            <th class="left name">Name</th>
            <th class="type">Type</th>
            <th class="description">Description</th>
            <th class="right" colspan="3">Action</th>
        </thead>

        <tbody>
          <?php
            $pets = getPetsWithOwner($_SESSION["email"]);

            for ($x = 0; $x < count($pets); $x++) {
              $name = $pets[$x]->name;
              $type = $pets[$x]->type;
              $description = $pets[$x]->description;
              $owner = $pets[$x]->owner;
              $key_info = "
                <input type='hidden' name='name' value='".$name."'>
                <input type='hidden' name='owner' value='".$owner."'";
              echo "
                <tr>
                  <td class='left name'>".$name."</td>
                  <td class='type'>".$type."<td>
                  <td class='top description'>".$description."</td>
                  <td class='edit'>
                    <form action=". $_ROUTER['edit_pet'] ." method='get'>
                      <input type='hidden' name='choice' value='0'>"
                      .$key_info.">
                      <button type='submit' class='btn-link'>Edit</button>
                    </form>
                  </td>
                  <td class='delete'>
                    <form action='". $_ROUTER['delete_pet'] ."' method='post'>
                      <input type='hidden' name='choice' value='1'>"
                      .$key_info.">
                      <button type='submit' class='btn-link'>Delete</button>
                    </form>
                  </td>
                  <td class='make-offer right'>
                    <form action='actionPet.php' method='post'>
                      <input type='hidden' name='choice' value='2'"
                      .$key_info.">
                      <button type='submit' class='btn-link'>Make Offer</button>
                    </form>
                  </td>
                </tr>
              ";

            }
          /*
          <tr>
            <td class="left name">Mimi</td>
            <td class="type">cat</td>
            <td class="top description">Small</td>
            <td class="edit"><a href="#">Edit</a></td>
            <td class="delete"><a href="#">Delete</a></td>
            <td class="make-offer right"><a href="#">Make offer</a></td>
          </tr>

          ?>
        </tbody>
      </table>
    </section>

    <div class="btn btn-offer">See Offer</div>

    <section id="offer">
      <section id="pend-offer">
        <table>
          <thead>
            <tr class="header-status">
              <th class="left top right"colspan="7">Pending Offer</th>
            </tr>
            <tr>
              <th class="left pend-pet">Pet</th>
              <th class="pend-taker">Taker</th>
              <th class="pend-start-date">Care start date</th>
              <th class="pend-end-date">Care end date</th>
              <th class="pend-price">Price</th>
              <th class="pend-location">Location</th>
              <th class="right"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $offers = getPendingOffersByUser($_SESSION["email"]);
              for ($x = 0; $x < count($offers); $x++) {
                $p_name = $offers[$x]->p_name;
                $p_owner = $offers[$x]->p_owner;
                $t_email = $offers[$x]->t_email;
                $care_start_date = $offers[$x]->care_start_date;
                $care_end_date = $offers[$x]->care_end_date;
                $price = $offers[$x]->price;
                $p_location = $offers[$x]->p_location;

                echo "
                  <tr>
                    <td class='left pend-pet'>".$p_name."</td>
                    <td class='pend-taker'>".$t_email."</td>
                    <td class='pend-start-date'>".$care_start_date."</td>
                    <td class='pend-end-date'>".$care_end_date."</td>
                    <td class='pend-price'>".$price."</td>
                    <td class='pend-location'>".$p_location."</td>
                    <td class='btn-delete right'>Del</td>
                  </td>
                ";
              }
            /*
            <tr>
              <td class="left pend-pet">Luffy</td>
              <td class="pend-taker">Agus</td>
              <td class="pend-start-date">03/11/2017</td>
              <td class="pend-end-date">10/11/2017</td>
              <td class="pend-price">10000</td>
              <td class="pend-location">NUS</td>
              <td class="btn-delete right"><a href="#">Del</a></td>
            </tr>
            */
            ?>
          </tbody>
        </table>
      </section>

      <section id="acc-offer">
        <table>
          <thead>
            <tr class="header-status">
              <th class="left top right"colspan="5">Accepted Offer</th>
            </tr>
            <tr>
              <th class="left acc-pet">Pet</th>
              <th class="acc-taker">Taker</th>
              <th class="acc-start-date">Care start date</th>
              <th class="acc-end-date">Care end date</th>
              <th class="acc-rating right">Rating</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $offers = getAcceptedOffersByUser($_SESSION["email"]);

              for ($x = 0; $x < count($offers); $x++) {
                $p_owner = $offers[$x]->p_owner;
                $p_name = $offers[$x]->p_name;
                $t_email = $offers[$x]->t_email;
                $care_start_date = $offers[$x]->care_start_date;
                $care_end_date = $offers[$x]->care_end_date;

                echo '
                  <tr>
                    <td class="left acc-pet">'.$p_name.'</td>
                    <td class="acc-taker">'.$t_email.'</td>
                    <td class="acc-start-date">'.$care_start_date.'</td>
                    <td class="acc-end-date">'.$care_end_date.'</td>
                    <td class="acc-rating">
                    <form action="rateOffer.php" method="post">
                      <input type="hidden" name="p_owner" value="'.$p_owner.'">
                      <input type="hidden" name="p_name" value="'.$p_name.'">
                      <input type="hidden" name="t_email" value="'.$t_email.'">
                      <input type="hidden" name="date" value="'.$care_start_date.'">
                      <button class="rate" id="rate1" name="rate" value="1" type="submit" class="btn btn-link">1</button>
                      <button class="rate" id="rate2" name="rate" value="2" type="submit" class="btn btn-link">2</button>
                      <button class="rate" id="rate3" name="rate" value="3" type="submit" class="btn btn-link">3</button>
                      <button class="rate" id="rate4" name="rate" value="4" type="submit" class="btn btn-link">4</button>
                      <button class="rate" id="rate5" name="rate" value="5" type="submit" class="btn btn-link">5</button>
                    </form>
                    </td>
                  </tr>
                ';
              }
            /*
              <tr class="first">
                <td class="left acc-pet"></td>
                <td class="acc-taker"></td>
                <td class="acc-start-date"></td>
                <td class="acc-end-date"></td>
                <td class="acc-rating right"></td>
              </tr>
              */
            ?>
          </tbody>
        </table>
      </section>
    </section>



  </body>

  <script src="main.js"></script>
</html>
