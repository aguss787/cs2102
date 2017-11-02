<?php
	session_start();

    $logged_in = isset($_SESSION['email']);

    if(!$logged_in) {
        header('Location:./index.php');
    }
?>

<?php
	include_once __DIR__ . '/controller/userController.php';
	include_once __DIR__ . '/controller/takerController.php';
	
	$istaker = isTaker($_SESSION['email']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mainpage</title>
    <link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<body>

<?php include 'navbar.php';?>

<!--------------------------------- THIS IS TAKER -------------------------------->
<!---------------------------- IF USER IS TAKER, SHOW ---------------------------->
<script>
	var istaker = <?php echo $istaker; ?>;
	if (istaker === "false") {
		document.getElementById("taker").style.display = "none";
	}
</script>

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
<!-- REPLACE THE DATA FROM DATABASE -->
<!-- SAMPLE -->
<?php
echo '<td class="left taker-pet"></td>';
?>
		<script>
		var mytable = "";
			for (i = 0; i < 20; i++) {
				mytable += '<tr>' +
				  '<td class="left taker-pet"></td>' +
				  '<td class="taker-user"></td>' +
				  '<td class="taker-start-date"></td>' +
				  '<td class="taker-end-date"></td>' +
				  '<td class="taker-price"></td>' +
				  '<td class="taker-location"></td>' +
				  '<td class="taker-accept">Acc</td>' +
				  '<td class="right taker-reject">Rj</td>' +
				'</tr>';
			}
		document.write(mytable);
		</script>
<!------------------------------------>
      </tbody>
    </table>
  </section>

  <section id="pend-offer">
    <table>
      <thead>
        <tr class="header-status">
          <th class="left top right"colspan="7">Accepted Offer(Taker)</th>
        </tr>
        <tr>
          <th class="left pend-pet">Pet</th>
          <th class="pend-taker">Name</th>
          <th class="pend-start-date">Care start date</th>
          <th class="pend-end-date">Care end date</th>
          <th class="pend-price">Price</th>
          <th class="pend-location">Location</th>
          <th class="right"></th>
        </tr>
      </thead>
      <tbody>
<!-- REPLACE THE DATA FROM DATABASE -->
<!-- SAMPLE -->
		<script>
		var mytable = "";
			for (i = 0; i < 20; i++) {
				mytable += '<tr>' +
				  '<td class="left pend-pet"></td>' +
				  '<td class="pend-taker"></td>' +
				  '<td class="pend-start-date"></td>' +
				  '<td class="pend-end-date"></td>' +
				  '<td class="pend-price"></td>' +
				  '<td class="pend-location"></td>' +
				  '<td class="btn-delete right">Del</td>' +
			   '</tr>';
			}
		document.write(mytable);
		</script>
<!------------------------------------>
      </tbody>
    </table>
  </section>
</section>
<!-------------------------- UNTIL HERE IS ADDITIONAL DATA FOR TAKER ------------------------->

<section id="pet">
  <table>
    <thead>
      <tr class="header-status">
        <th class="left top pet" colspan="3">Pet</th>
        <th class="right top add" colspan="3">Add</th>
      </tr>
      <tr>
        <th class="left name">Name</th>
        <th class="type">Type</th>
        <th class="description">Description</th>
        <th class="right" colspan="3">Action</th>
    </thead>

    <tbody>
<!-- REPLACE THE DATA FROM DATABASE -->
<!-- SAMPLE -->
<script>
var mytable = "";
	for (i = 0; i < 20; i++) {
      mytable += '<tr>' +
        '<td class="left name"></td>' +
        '<td class="type"></td>' +
        '<td class="top description"></td>' +
        '<td class="edit">Edit</td>' +
        '<td class="delete">Delete</td>' +
        '<td class="make-offer right">Make offer</td>' +
      '</tr>';
	}
document.write(mytable);
</script>
<!------------------------------------>
    </tbody>
  </table>
</section>

<div class="container">
<button onclick="hide()" class="btn btn-offer">See Offer</button>
</div>

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
<!-- REPLACE THE DATA FROM DATABASE -->
<!-- SAMPLE -->
<script>
var mytable = "";
	for (i = 0; i < 20; i++) {
        mytable += '<tr>' +
          '<td class="left pend-pet"></td>' +
          '<td class="pend-taker"></td>' +
          '<td class="pend-start-date"></td>' +
          '<td class="pend-end-date"></td>' +
          '<td class="pend-price"></td>' +
          '<td class="pend-location"></td>' +
          '<td class="btn-delete right">Del</td>' +
        '</tr>';
	}
document.write(mytable);
</script>
<!------------------------------------>
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
<!-- REPLACE THE DATA FROM DATABASE -->
<!-- SAMPLE -->
<script>
var mytable = "";
	for (i = 0; i < 20; i++) {	  
        mytable += '<tr>' +
          '<td class="left acc-pet"></td>' +
          '<td class="acc-taker"></td>' +
          '<td class="acc-start-date"></td>' +
          '<td class="acc-end-date"></td>' +
          '<td class="acc-rating right">' +
			'<span class="starRating">' +
				'<input id="rating5" type="radio" name="rating" + i value="5">' +
				'<label for="rating5">5</label>' +
				'<input id="rating4" type="radio" name="rating" value="4">' +
				'<label for="rating4">4</label>' +
				'<input id="rating3" type="radio" name="rating" value="3">' +
				'<label for="rating3">3</label>' +
				'<input id="rating2" type="radio" name="rating" value="2">' +
				'<label for="rating2">2</label>' +
				'<input id="rating1" type="radio" name="rating" value="1">' +
				'<label for="rating1">1</label>' +
			'</span>' +
		  '</td>' +
        '</tr>';
	}
document.write(mytable);
</script>
<!------------------------------------>
      </tbody>
    </table>
  </section>
</section>
</body>
<script>
document.getElementById("offer").style.display = "none";
function hide() {
	var x = document.getElementById("offer");
	if (x.style.display === "none") {
		x.style.display = "block";
	} else {
		x.style.display = "none";
	}
}
</script>
</html>
