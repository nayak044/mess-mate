<!doctype html>
<html>

<head>
	<title>Mess Menu</title>
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
	$conn = mysqli_connect('localhost', 'root', 'AIDNITRA#P98', 'mess_management');
	$query = mysqli_query($conn, "select * from messmenu ");
	?>
	<table align="center" border="1px" style="width:800px; line-height:60px;">
		<tr>
			<th colspan="9">
				<h2>mess # menu</h2>
			</th>
		</tr>
		<tr>
			<th> meal_courses_offered </th>
			<th> cost </th>
			<th> monday </th>
			<th> tuesday </th>
			<th> wednesday </th>
			<th> thursday </th>
			<th> friday </th>
			<th> saturday </th>
			<th> sunday </th>
		</tr>

		<?php
		if (mysqli_num_rows($query) != 0) {
			while ($rows = mysqli_fetch_assoc($query)) {
				?>

				<tr>
					<td> <?php echo $rows['meal_courses_offered']; ?></td>
					<td> <?php echo $rows['cost']; ?></td>
					<td> <?php echo $rows['monday']; ?></td>
					<td> <?php echo $rows['tuesday']; ?></td>
					<td> <?php echo $rows['wednesday']; ?></td>
					<td> <?php echo $rows['thursday']; ?></td>
					<td> <?php echo $rows['friday']; ?></td>
					<td> <?php echo $rows['saturday']; ?></td>
					<td> <?php echo $rows['sunday']; ?></td>

				</tr>
				<?php
			}
		}
		?>

	</table>
	<p align="right"><a href="admin.php">click here to visit back </a><br></p>

</body>

</html>