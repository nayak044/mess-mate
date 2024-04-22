<?php
session_start();
?>

<!doctype html>
<html>

<head>
	<title>coupons_registered</title>
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
	echo "hii ";
	echo $getname['student_name'];
	echo "<br>";
	echo "account holder ID - ";
	echo $_SESSION['sess_user'];

	$meal = array("breakfast", "lunch", "high_tea", "dinner");
	for ($x = 0; $x < 4; $x++) {
		$checkcoupon = mysqli_query($con, "select $meal[$x] from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and $meal[$x] = 1 and date = curdate() ");//remove +1
		$no_row = mysqli_num_rows($checkcoupon);

		if ($no_row > 0) {
			if ($meal[$x] == 'breakfast') {
				?>
				<form action="" method="post">
					<input type="submit" name="use_breakfast_coupon" value="use_breakfast_coupon"><br>
				</form>
				<?php
				if (isset($_POST['use_breakfast_coupon'])) {

					$getused = mysqli_query($con, "select used_breakfast from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//curdate remove +1
					$getusedvalue = mysqli_fetch_assoc($getused);
					if ($getusedvalue["used_breakfast"] == 0) {
						$usebreakfast = mysqli_query($con, "update coupons_registered set used_breakfast = 1,b_used_time = current_timestamp()
														where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//remove +1 later
	
					}

					$getused1 = mysqli_query($con, "select used_breakfast from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//curdate remove +1
					$getusedvalue1 = mysqli_fetch_assoc($getused1);

					if ($getusedvalue1["used_breakfast"] == 1) {
						$gettime1 = mysqli_query($con, "select b_used_time from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//remove +1
						$gettimevalue1 = mysqli_fetch_assoc($gettime1);
						echo "breakfast coupon is selected at ";
						echo $gettimevalue1["b_used_time"];
					}
				}
			}


			if ($meal[$x] == 'lunch') {
				?>
				<form action="" method="post">
					<input type="submit" name="use_lunch_coupon" value="use_lunch_coupon"><br>
				</form>
				<?php
				if (isset($_POST['use_lunch_coupon'])) {

					$getused = mysqli_query($con, "select used_lunch from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//curdate remove +1
					$getusedvalue = mysqli_fetch_array($getused);
					if ($getusedvalue["used_lunch"] == 0) {
						$uselunch = mysqli_query($con, "update coupons_registered set used_lunch = 1,l_used_time = current_timestamp()
														where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//remove +1 later
	
					}

					$getused1 = mysqli_query($con, "select used_lunch from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//curdate remove +1
					$getusedvalue1 = mysqli_fetch_array($getused1);

					if ($getusedvalue1["used_lunch"] == 1) {
						$gettime1 = mysqli_query($con, "select l_used_time from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//remove +1
						$gettimevalue1 = mysqli_fetch_assoc($gettime1);
						echo "lunch coupon is selected at ";
						echo $gettimevalue1["l_used_time"];
					}
				}
			}

			if ($meal[$x] == 'high_tea') {
				?>
				<form action="" method="post">
					<input type="submit" name="use_high_tea_coupon" value="use_high_tea_coupon"><br>
				</form>
				<?php
				if (isset($_POST['use_high_tea_coupon'])) {
					$getused = mysqli_query($con, "select used_high_tea from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//curdate remove +1
					$getusedvalue = mysqli_fetch_array($getused);
					if ($getusedvalue["used_high_tea"] == 0) {
						$usehigh_tea = mysqli_query($con, "update coupons_registered set used_high_tea = 1,h_used_time = current_timestamp()
														where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//remove +1 later
						//$gettime =  mysqli_query($con,"select h_used_time_used_time from coupons_registered where student_id = '".$_SESSION['sess_user']."' and date = curdate()+1 ")	;//remove +1
						//$gettimevalue = mysqli_fetch_assoc($gettime);
	
					}

					$getused1 = mysqli_query($con, "select used_high_tea from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//curdate remove +1
					$getusedvalue1 = mysqli_fetch_array($getused1);

					if ($getusedvalue1["used_high_tea"] == 1) {
						$gettime1 = mysqli_query($con, "select h_used_time from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//remove +1
						$gettimevalue1 = mysqli_fetch_assoc($gettime1);
						echo "high_tea coupon is selected at ";
						echo $gettimevalue1["h_used_time"];
					}
				}
			}

			if ($meal[$x] == 'dinner') {
				?>
				<form action="" method="post">
					<input type="submit" name="use_dinner_coupon" value="use_dinner_coupon"><br>
				</form>
				<?php
				if (isset($_POST['use_dinner_coupon'])) {

					$getused = mysqli_query($con, "select used_dinner from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//curdate remove +1
					$getusedvalue = mysqli_fetch_array($getused);
					if ($getusedvalue["used_dinner"] == 0) {
						$usedinner = mysqli_query($con, "update coupons_registered set used_dinner = 1,d_used_time = current_timestamp()
														where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate()");//remove +1 later
	
					}

					$getused1 = mysqli_query($con, "select used_dinner from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//curdate remove +1
					$getusedvalue1 = mysqli_fetch_array($getused1);


					if ($getusedvalue1["used_dinner"] == 1) {
						$gettime1 = mysqli_query($con, "select d_used_time from coupons_registered where student_id = '" . $_SESSION['sess_user'] . "' and date = curdate() ");//remove +1
						$gettimevalue1 = mysqli_fetch_assoc($gettime1);
						echo "dinner coupon is selected at ";
						echo $gettimevalue1["d_used_time"];
					}
				}
			}
		}

	}
	?>
	<br>

	<p align="right"><a href="member.php">click here to visit back </a><br></p>


</body>