<?php
session_start();
?>
<!doctype html>
<html>

<head>
	<title>student login page</title>

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


	$con = mysqli_connect('localhost', 'root', 'AIDNITRA#P98', 'mess_management');
	$name = mysqli_query($con, "select student_name from stu_info where student_id = '" . $_SESSION['sess_user'] . "' ");
	$getname = mysqli_fetch_assoc($name);
	echo "Hii......<br>";
	echo $getname['student_name'];
	echo "<br>";
	echo "Student_ID - ";
	echo $_SESSION['sess_user'];


	?>


	<p><a href="mess_menu.php">view mess menu</a></p>
		<?php

		$con = mysqli_connect('localhost', 'root', 'AIDNITRA#P98', 'mess_management');
		$items = [];
		$_SESSION['breakfast'] = 0;
		$_SESSION['lunch'] = 0;
		$_SESSION['high_tea'] = 0;
		$_SESSION['dinner'] = 0;

		?>
</body>

</html>