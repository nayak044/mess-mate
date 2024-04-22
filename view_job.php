<!doctype html>
<html>

<head>
	<title>VIEW JOB DETAILS</title>
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
	$conn = mysqli_connect('localhost:3306', 'root', 'AIDNITRA#P98');
	$query = mysqli_query($conn, "select * from designation_details ");
	?>
	<table align="center" border="1px" style="width:800px; line-height:60px;">
		<tr>
			<th colspan="4">
				<h2>JOB DETAILS</h2>
			</th>
		</tr>
		<tr>


			<th> Designation_id </th>
			<th> Job </th>
			<th> Working days </th>
			<th> Salary </th>
		</tr>

		<?php
		if (mysqli_num_rows($query) != 0) {
			while ($rows = mysqli_fetch_assoc($query)) {
				?>

				<tr>
					<td> <?php echo $rows['designation_id']; ?></td>
					<td> <?php echo $rows['job']; ?></td>
					<td> <?php echo $rows['working_days']; ?></td>
					<td> <?php echo $rows['salary']; ?></td>
				</tr>
				<?php
			}
		}
		?>

	</table>
	<p align="right"><a href="admin.php"> click here to visit back </a></p>


</body>

</html>