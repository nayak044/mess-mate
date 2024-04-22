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
	<p><a href="coupons_registered.php">view selected coupons</a></p>

	<?php
	$query1 = mysqli_query($con, "SELECT wallet_money FROM stu_info WHERE student_id='" . $_SESSION['sess_user'] . "'");
	$row = mysqli_fetch_array($query1);

	echo "your wallet balance - ";
	echo $row['wallet_money'];

	?>

	<h3>select the coupons</h3>

	<form action="" method="post">

		<input type="checkbox" name="choice[]" value="breakfast">breakfast<br>
		<input type="checkbox" name="choice[]" value="lunch">lunch<br>
		<input type="checkbox" name="choice[]" value="high_tea">high tea<br>
		<input type="checkbox" name="choice[]" value="dinner">dinner<br>
		<input type="submit" name="submit" value="select"><br>

		<?php

		$con = mysqli_connect('localhost', 'root', 'AIDNITRA#P98', 'mess_management');
		$items = [];
		$_SESSION['breakfast'] = 0;
		$_SESSION['lunch'] = 0;
		$_SESSION['high_tea'] = 0;
		$_SESSION['dinner'] = 0;

		$total_price = 0;
		$initial = mysqli_query($con, "select * from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() + 1 ");// and date = curdate()+1
		$i_row_no = mysqli_num_rows($initial);
		if ($i_row_no == 0) {
			$insert = mysqli_query($con, "insert into coupons_registered(student_id,date) values('" . $_SESSION['sess_user'] . "',curdate() +1  ) ");// and date = curdate()+1
			//echo "fff";
		}
		if (isset($_POST['submit'])) {

			if (!empty($_POST['choice'])) {
				foreach ($_POST['choice'] as $item) {
					//$temp = mysqli_query($con,"select $item from coupons_registered where student_id = '".$_SESSION['sess_user']."' and $item != 1 ");
					//if($temp)
					//{
					//	echo "hi";
					//}
					//$row = mysqli_fetch_assoc($temp);
					//echo "$row[$item]";
					//
					$check = mysqli_query($con, "select $item from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and $item = 1 and date = curdate() + 1 ");//and date = curdate()+1
					$rowcheck = mysqli_num_rows($check);

					if ($rowcheck == 1) {
						echo "the ";
						echo $item;
						echo " coupon is already taken";
						echo "<br>";
						/*?>
									
									<form action = "member.cpp" method = "post"> 
									<input type = "submit" name = "select again" value = "select coupons again" ><br>
									</form>
									<?php*/
					} else {
						//echo "$item";
						if ($item == 'breakfast') {
							$_SESSION['breakfast'] = 1;
						}

						if ($item == 'lunch')
							$_SESSION['lunch'] = 1;

						if ($item == 'high_tea')
							$_SESSION['high_tea'] = 1;

						if ($item == 'dinner')
							$_SESSION['dinner'] = 1;

						/*echo "######";
								 echo $_SESSION['breakfast'];
								 echo $_SESSION['lunch'];
								 echo $_SESSION['high_tea'];
								 echo $_SESSION['dinner'];*/
						//echo "<br>";
						$sql = mysqli_query($con, "select cost from messmenu where meal_courses_offered = '" . $item . "' ");
						$row1 = mysqli_fetch_array($sql);
						echo $item;
						echo "-";
						echo $row1["cost"];
						echo "<br>";
						$total_price = ($total_price) + ($row1["cost"]);
					}

				}
				echo "total price is - ";
				echo $total_price;
				$_SESSION['tot_price'] = $total_price;
			}
		} else {
			echo "please select any one coupon\r\n";
		}

		if (isset($_POST['submit']) && $_SESSION['tot_price'] == 0) {
			?>
			<p>please select the coupons again!!!!</p>
			<?php
		}

		if (isset($_POST['submit']) && $_SESSION['tot_price'] > 0) {
			?>
			<p><a href="pay.php">make payment<a></p>
			<?php
		}
		?>
</body>

</html>