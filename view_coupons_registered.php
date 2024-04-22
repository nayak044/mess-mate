<!doctype html>
<html>

<head>
	<title>Coupons registered</title>
	<style>
		body {

			margin-top: 100px;
			margin-bottom: 100px;
			margin-right: 150px;
			margin-left: 80px;
			background-color: azure;
			color: purple;
			font-family: verdana;
			font-size: 100%
		}

		h1 {
			color: indigo;
			font-family: verdana;
			font-size: 100%;
		}

		h3 {
			color: indigo;
			font-family: verdana;
			font-size: 100%;
		}
	</style>
</head>

<body>

	<p align="right"><a href="index.php">log out </a></p>

	<?php
	$conn = mysqli_connect('localhost', 'root', 'AIDNITRA#P98', 'mess_management');
	$query = mysqli_query($conn, "select * from coupons_registered ");
	?>
	<table align="center" border="1px" style="width:3000px; line-height:60px;">
		<tr>
			<th colspan="14">
				<h2>DETAILS OF COUPONS REGISTERED BY STUDENTS</h2>
			</th>
		</tr>
		<tr>


			<th> Student id </th>
			<th> Coupons for date </th>
			<th> Bought Breakfast coupon </th>
			<th> Used Breakfast coupon </th>
			<th> Breakfast coupon used at </th>
			<th> Bought lunch coupon </th>
			<th> Used lunch coupon </th>
			<th> Lunch coupon used at </th>
			<th> Bought high-tea coupon </th>
			<th> Used high-tea coupon </th>
			<th> High-tea coupon used at </th>
			<th> Bought Dinner coupon </th>
			<th> Used Dinner coupon </th>
			<th> Dinner coupon used at </th>

		</tr>

		<?php
		if (mysqli_num_rows($query) != 0) {
			while ($rows = mysqli_fetch_assoc($query)) {
				?>

				<tr>
					<td> <?php echo $rows['student_id']; ?></td>
					<td> <?php echo $rows['date']; ?></td>
					<td> <?php echo $rows['breakfast']; ?></td>
					<td> <?php echo $rows['used_breakfast']; ?></td>
					<td> <?php echo $rows['b_used_time']; ?></td>
					<td> <?php echo $rows['lunch']; ?></td>
					<td> <?php echo $rows['used_lunch']; ?></td>
					<td> <?php echo $rows['l_used_time']; ?></td>
					<td> <?php echo $rows['high_tea']; ?></td>
					<td> <?php echo $rows['used_high_tea']; ?></td>
					<td> <?php echo $rows['h_used_time']; ?></td>
					<td> <?php echo $rows['dinner']; ?></td>
					<td> <?php echo $rows['used_dinner']; ?></td>
					<td> <?php echo $rows['d_used_time']; ?></td>


				</tr>
				<?php
			}
		}
		?>

	</table>

	<br><br><br><br>

	<table align="center" border="1px" style="width:500px; line-height:60px;">
		<tr>
			<th colspan="5">
				<h1>TOTAL NUMBER OF COUPONS REGISTERED PER DAY</h1>
			</th>
		</tr>
		<tr>


			<th> Date </th>
			<th> Breakfast </th>
			<th> Lunch </th>
			<th> High-tea </th>
			<th> Dinner </th>

		</tr>

		<?php

		$query1 = mysqli_query($conn, "select * from coupons_registered where breakfast=1 and date=curdate()+1");
		$row1 = mysqli_num_rows($query1);
		$query2 = mysqli_query($conn, "select * from coupons_registered where lunch=1 and date=curdate()+1");
		$row2 = mysqli_num_rows($query2);
		$query3 = mysqli_query($conn, "select * from coupons_registered where high_tea=1 and date=curdate()+1");
		$row3 = mysqli_num_rows($query3);
		$query4 = mysqli_query($conn, "select * from coupons_registered where dinner=1 and date=curdate()+1");
		$row4 = mysqli_num_rows($query4);
		$date = mysqli_fetch_assoc($query1);

		?>


		<tr>
			<td> <?php echo $date['date']; ?></td>
			<td> <?php echo $row1; ?></td>
			<td> <?php echo $row2; ?></td>
			<td> <?php echo $row3; ?></td>
			<td> <?php echo $row4; ?></td>
		</tr>





	</table>



	<p align="right"><a href="admin.php"> click here to visit back </a></p>


</body>

</html>