<!doctype html>
<html>

<head>
	<title>employee details</title>
	<style>
		body {

			margin-top: 100px;
			margin-bottom: 100px;
			margin-right: 150px;
			margin-left: 80px;
			background-color: azure;
			color: palevioletred;
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
	require_once 'config.php';

	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)  or die(mysql_error());
	$query = mysqli_query($conn, "select * from mess_member ");
	?>
	<table align="center" border="1px" style="width:2500px; line-height:60px;">
		<tr>
			<th colspan="15">
				<h2>EMPLOYEE DETAILS</h2>
			</th>
		</tr>
		<tr>
			<th> Employee id </th>
			<th> First name </th>
			<th> Last name </th>
			<th> Designation id</th>
			<th> Date of birth </th>
			<th> Email id</th>
			<th> Hire date</th>
			<th> No. of leaves</th>
			<th> Gross salary </th>
			<th> House no </th>
			<th> Street no </th>
			<th> Street name </th>
			<th> City </th>
			<th> State </th>
			<th> Pincode </th>
		</tr>

		<?php
		if (mysqli_num_rows($query) != 0) {
			while ($rows = mysqli_fetch_assoc($query)) {
				?>

				<tr>
					<td> <?php echo $rows['emp_id']; ?></td>
					<td> <?php echo $rows['first_name']; ?></td>
					<td> <?php echo $rows['last_name']; ?></td>
					<td> <?php echo $rows['designation_id']; ?></td>
					<td> <?php echo $rows['date_of_birth']; ?></td>
					<td> <?php echo $rows['email_id']; ?></td>
					<td> <?php echo $rows['hire_date']; ?></td>
					<td> <?php echo $rows['no_of_leaves']; ?></td>
					<td> <?php echo $rows['gross_salary']; ?></td>
					<td> <?php echo $rows['house_no']; ?></td>
					<td> <?php echo $rows['street_no']; ?></td>
					<td> <?php echo $rows['street_name']; ?></td>
					<td> <?php echo $rows['city']; ?></td>
					<td> <?php echo $rows['state']; ?></td>
					<td> <?php echo $rows['pincode']; ?></td>

				</tr>
				<?php
			}
		}
		?>

	</table>
	<p align="right"><a href="admin.php"> click here to visit back </a></p>


</body>

</html>