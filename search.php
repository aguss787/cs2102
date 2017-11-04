<?php
    session_start();

    include_once __DIR__ . '/controller/userController.php';
    include_once __DIR__ . '/controller/takerController.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <style type="text/css">
        div.overflow {
            max-height: 80vh;
            overflow:auto;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .tname {
            width: 20%;
        }

        .tloc {
            width: 30%;
        }

        .one, .two, .three, .four, .five {
            width: 10%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <div class="center">
        <h1>Search</h1>
            <form action="dealSearch.php" method="post"> <!-- read input and put into table below-->
                Name:<br>
                <input type="text" name="q_name" placeholder="Ex: Nguyen Hoai Viet">
                <br>
                Preference:<br>
                <input type="text" name="q_preference" placeholder="Ex: dog">
                <br>
                Min Rating:<br>
                <input type="number" name="q_rating"  placeholder="Ex: 3.5" step="0.1" min="0" max="5" value="0" required>
                <br><br>
                <?php
                    /*
                        num = 0 => normal search
                        num = 1 => make offer search
                    */
                    if (!isset($_POST['name']) or !isset($_POST['owner'])) {
                        echo '<input type="hidden" name="num" value="0">';
                        $searchType = 0;
                    } else {
                        echo '<input type="hidden" name="num" value="1">';
                        echo '<input type="hidden" name="name" value="'.$_POST['name'].'">';
                        echo '<input type="hidden" name="owner" value='.$_POST['owner'].'">';
                        $searchType = 1;
                    }
                ?>
                <input type="submit" value="Search">
            </form>

        <table>
            <caption style="font-weight: bold; font-size: 20px;">Taker list</caption>
            <thead>
                <tr>
                    <th class="tname">Taker name</th>
                    <th class="tloc">Taker location</th>
                    <th class="one">One star</th>
                    <th class="two">Two star</th>
                    <th class="three">Three star</th>
                    <th class="four">Four star</th>
                    <th class="five">Fifth star</th>
                </tr>
            </thead>
        </table>
        <div class="overflow">
            <table>
                <tbody>
                    <?php

                        if (!isset($_POST['numTakers'])) {
                            echo '
                                <tr> <!-- loop through the list of taker and write out -->
                                    <td class="tname">N.A</td>  <!-- the name is clickable and when click can get to that taker profile -->
                                    <td class="tloc">N.A</td>
                                    <td class="one">N.A</td>
                                    <td class="two">N.A</td>
                                    <td class="three">N.A</td>
                                    <td class="four">N.A</td>
                                    <td class="five">N.A</td>
                                </tr>
                            ';
                        } else {
                            for ($i = 0; $i < $_POST['numTakers']; $i++) {
                                $taker = getTaker($_POST['taker'.$i]);
                                $user = getUser($taker->email);
                                $taker_name = $user->full_name;
                                $taker_location = $user->address;
                                $taker_one_star = $taker->one_star;
                                $taker_two_star = $taker->two_star;
                                $taker_three_star = $taker->three_star;
                                $taker_four_star = $taker->four_star;
                                $taker_five_star = $taker->five_star;
                                if ($searchType == 0) {
                                    $temp = '
                                        <form action="profile.php" method="get">
                                            <input type="hidden" name="email" value="'.$_POST['taker'.$i].'">
                                            <input type="hidden" name="next" value="0">
                                            <button type="submit">'.$taker_name.'</button>
                                        </form>
                                    ';
                                } else {
                                    $temp = '
                                        <form action="offer_final.php" method="post">
                                            <input type="hidden" name="email" value="'.$_POST['taker'.$i].'">
                                            <input type="hidden" name="name" value="'.$_POST['name'].'">
                                            <input type="hidden" name="owner" value="'.$_POST['owner'].'">
                                            <button type="submit">'.$taker_name.'</button>
                                        </form>
                                    ';
                                }

                                echo '
                                    <tr>
                                        <td class="tname">'.$temp.'</td>
                                        <td class="tloc">'.$taker_location.'</td>
                                        <td class="one">'.$taker_one_star.'</td>
                                        <td class="two">'.$taker_two_star.'</td>
                                        <td class="three">'.$taker_three_star.'</td>
                                        <td class="four">'.$taker_four_star.'</td>
                                        <td class="five">'.$taker_five_star.'</td>
                                    </tr>
                                ';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
