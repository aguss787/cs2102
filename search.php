<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="afterlogin-user.css">
	<style type="text/css">
		table {
    		font-family: arial, sans-serif;
    		border-collapse: collapse;
    		width: 100%;
		}

		td, th {
    		border: 1px solid #dddddd;
    		text-align: left;
    		padding: 8px;
		}
	</style>
</head>
<body>
	<ul>
		<li><a href="#">NAVY</a></li> <!--go to mainpage-->
		<li style="float:right"><a href="index.php">Sign out</a></li>
	</ul>
	<div>
		<p class="heading">Search</p>
		<form action="#"> <!-- read input and put into table below-->
  			Name:<br>
  			<input type="text" name="name" placeholder="Ex: Nguyen Hoai Viet">
  			<br>
  			Preference<br>
  			<input type="text" name="preference" placeholder="Ex: dog">
  			<br>
  			Min Rating:<br>
  			<input type="number" name="rating"  placeholder="Ex: 3.5" step="0.1" min="1" max="5">
  			<br><br>
  			<input type="submit" value="Search">
		</form>
		<table>
			<caption style="font-weight: bold; font-size: 20px;">Taker list</caption>
			<thead>
				<tr>
					<th>Taker name</th>
					<th>Taker location</th>
					<th>One star</th>
					<th>Two star</th>
					<th>Three star</th>
					<th>Four star</th>
					<th>Fifth star</th>
				</tr>
			</thead>
			<tbody>
				<tr> <!-- loop through the list of taker and write out -->
					<td>N.A</td>  <!-- the name is clickable and when click can get to that taker profile -->
					<td>N.A</td>
					<td>N.A</td>
					<td>N.A</td>
					<td>N.A</td>
					<td>N.A</td>
					<td>N.A</td>
				</tr>
			</tbody>
		</table>
	</div> 
</body>
</html>