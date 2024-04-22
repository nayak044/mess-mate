<?php
session_start();
?>

<!doctype html>
<html>

<head>
	<title>confirmation message</title>
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
	echo "Student ID - ";
	echo $_SESSION['sess_user'];

	$query1 = mysqli_query($con, "SELECT wallet_money FROM stu_info WHERE student_id='" . $_SESSION['sess_user'] . "'");
	$row = mysqli_fetch_array($query1);

	$stu_id = $_SESSION['sess_user'];
	$row['wallet_money'] = $row['wallet_money'] - $_SESSION["tot_price"];
	$updatedmoney = $row['wallet_money'];
	$sql = mysqli_query($con, "update stu_info set wallet_money = '$updatedmoney' where student_id='$stu_id' ");
	if ($sql) {
		echo "<br><br><br><br>";
		echo "payment made successfully...";
		echo "<br>";
		if ($_SESSION['breakfast'] == 1 || $_SESSION['lunch'] == 1 || $_SESSION['high_tea'] == 1 || $_SESSION['dinner'] == 1) {
			$query1 = mysqli_query($con, "select * from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() + 1");//and remove +1 date = curdate
			$numrows = mysqli_num_rows($query1);

			if ($numrows == 0) {
				$insert = mysqli_query($con, "insert into coupons_registered(student_id,date) values('" . $_SESSION['sess_user'] . "',curdate()) +1 ");// qwqw +1 add date value curdate
			}
		}

		if ($_SESSION['breakfast'] == 1) {

			//if()
			$coupons_registered = mysqli_query($con, "update coupons_registered set breakfast = true
				WHERE student_id='" . $_SESSION['sess_user'] . "' and date = curdate() + 1");//and set date  = curdate()+1
			if ($coupons_registered) {
				echo "<br>";
				echo "You bought a breakfast coupon :)";
			}
		}
		if ($_SESSION['lunch'] == 1) {
			$coupons_registered = mysqli_query($con, "update coupons_registered set lunch = true
				WHERE student_id='" . $_SESSION['sess_user'] . "' and date = curdate() +1 ");
			if ($coupons_registered) {
				echo "<br>";
				echo "You bought a lunch coupon :)";
			}
		}
		if ($_SESSION['high_tea'] == 1) {
			$coupons_registered = mysqli_query($con, "update coupons_registered set high_tea = true
				WHERE student_id='" . $_SESSION['sess_user'] . "' and date = curdate() +1");
			if ($coupons_registered) {
				echo "<br>";
				echo "You bought a  high_tea :)";
			}
		}
		if ($_SESSION['dinner'] == 1) {
			$coupons_registered = mysqli_query($con, "update coupons_registered set dinner = true
				WHERE student_id='" . $_SESSION['sess_user'] . "' and date = curdate() +1 ");
			if ($coupons_registered) {
				echo "<br>";
				echo "You bought a dinner coupon :)";
			}
		}

	}
	?>
	<p align="right"><a href="member.php">click here to visit back </a><br></p>
</body>

</html>