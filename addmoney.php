<?php
session_start();
?>
<html>

<head>
	<title>add money</title>
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
			font-size: 150%;
		}

		h3 {
			color: indigo;
			font-family: verdana;
			font-size: 100%;
		}

		h2 {
			color: black;
			font-family: verdana;
			font-size: 85%;
		}
	</style>

</head>

<body>
	<p align="right"><a href="index.php">log out </a></p>
	<h1>
		<center>Add money to wallet</center>
	</h1><br>
	<?php
	$con = mysqli_connect('localhost', 'root', 'AIDNITRA#P98', 'mess_management') or die(mysql_error());
	$name = mysqli_query($con, "select student_name from stu_info where student_id = '" . $_SESSION['sess_user'] . "' ");
	$getname = mysqli_fetch_assoc($name);
	echo $getname['student_name'];
	echo "<br>";
	echo "Student ID - ";
	echo $_SESSION['sess_user'];
	echo "<br>";
	echo "<br>";
	echo "<br>";

	$query1 = mysqli_query($con, "SELECT wallet_money FROM stu_info WHERE student_id='" . $_SESSION['sess_user'] . "'");
	$row = mysqli_fetch_array($query1);

	echo "Your wallet balance previously - ";
	echo $row['wallet_money'];
	echo "<br>";
	echo "<br>";
	?>
	<form action="" method="post">
		Enter the amount of money you want to add-<input type="text" name="moneyadded" />
		<input type="submit" name="submit" value="add money" />
	</form>
	<?php
	$con = mysqli_connect('localhost', 'root', 'AIDNITRA#P98', 'mess_management') or die(mysql_error());
	//echo $_POST["add money"];
	if (isset($_POST["submit"])) {

		if (!empty($_POST['moneyadded'])) {
			$stu_id = $_SESSION['sess_user'];
			$row['wallet_money'] = $row['wallet_money'] + $_POST['moneyadded'];
			$moneyadded = $row['wallet_money'];

			$sql = mysqli_query($con, "update stu_info set wallet_money = '$moneyadded'	 where student_id='$stu_id' ");

			if ($sql) {
				?>
				<h2>Amount added successfully<h2>
						<?php
						echo "<br>";
			} else {
				?>
						<h2>Failure<h2>
								<?php

								echo "<br>";
			}

			echo "New wallet balance - ";
			echo $row['wallet_money'];
		}

	}
	?>
					<br><br><br>
					<p align="right"><a href="member.php">click here to visit back </a></p>

</body>