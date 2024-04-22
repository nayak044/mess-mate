<?php
session_start();
?>
<!doctype html>
<html>

<head>
	<title>PAYMENT</title>
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
	$con = mysqli_connect('localhost', 'root', 'AIDNITRA#P98', 'mess_management') or die(mysql_error());
	$name = mysqli_query($con, "select student_name from stu_info where student_id = '" . $_SESSION['sess_user'] . "' ");
	$getname = mysqli_fetch_assoc($name);

	echo $getname['student_name'];
	echo "<br>";
	echo "Student_ID - ";
	echo $_SESSION['sess_user'];

	$query1 = mysqli_query($con, "SELECT wallet_money FROM stu_info WHERE student_id='" . $_SESSION['sess_user'] . "'");
	$row = mysqli_fetch_array($query1);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "your wallet balance - ";
	echo $row['wallet_money'];
	echo "<br>";
	echo "make payment of - ";
	echo $_SESSION["tot_price"];
	echo "<br>";
	echo "<br>";
	echo "<br>";
	?>
	<form action="addmoney.php" method="post">
		<input type="submit" name="add money" value="add money"><br><br>
	</form>
	<?php
	if ($_SESSION["tot_price"] <= $row['wallet_money']) {
		?>
		<form action="confirm.php" method="post">
			<input type="submit" name="pay" value="confirm payment">
		</form>
		<?php
	} else {
		echo "Insufficient money in wallet,try adding money...";
	}
	?>
	<p align="right"><a href="member.php">click here to visit back </a><br></p>
</body>

</html>