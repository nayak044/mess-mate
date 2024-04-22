<!doctype html>
<html>

<head>
	<title>update leaves</title>
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

	<center>
		<h3>UPDATE NO. OF LEAVES OF AN EMPLOYEE</h3><br>
	</center>
	<p align="right"><a href="index.php">log out </a></p>

	<?php
	$con = mysqli_connect('localhost', 'root', 'AIDNITRA#P98', 'mess_management');
	//$query  = mysqli_query($conn,"select * from messmenu ");
	?>
	<form action="" method="post">
		Enter the employee_id of employee whose no. of leaves is to be updated :<input type="text" name="emp_id"><br>
		Enter no. of leaves : <input type="number" name="leaves"><br>
		<input type="submit" name="confirm" value="confirm"> <br><br><br><br>

		<?php
		if (isset($_POST["confirm"])) {

			if (!empty($_POST['emp_id'])) {
				$query = "select * from emp_details where emp_id = '" . $_POST['emp_id'] . "' ";
				$query1 = mysqli_query($con, $query);
				if (mysqli_num_rows($query1) == 0) {
					echo "invalid employee_id...";
				} else {
					$update = "update emp_details set no_of_leaves = '" . $_POST['leaves'] . "' where emp_id = '" . $_POST['emp_id'] . "' ";
					$update1 = mysqli_query($con, $update);
					if ($update1) {
						echo "no. of leaves updated successfully...";
						echo "<br>";
					} else {
						echo "failure";
						echo "<br>";
					}
					$salary = "select salary from designation_details as d,emp_details as e where e.emp_id ='" . $_POST['emp_id'] . "' 
							and e.designation_id = d.designation_id ";
					$salary1 = mysqli_query($con, $salary);
					$salary2 = mysqli_fetch_assoc($salary1);


					(int) $no_of_leaves = $_POST['leaves'];

					$gross = (int) $salary2['salary'] - 50 * ($no_of_leaves);

					$grossupdate = "update emp_details set gross_salary = '" . $gross . "' where emp_id = '" . $_POST['emp_id'] . "' ";
					$update3 = mysqli_query($con, $grossupdate);
					if ($update3) {
						echo "gross salary is updated successfully...";
						echo "<br>";
					} else {
						echo "failure!!gross salary not updated";
						echo "<br>";
					}
				}
			} else {
				echo "Please enter employee id and click submit...";
			}
		}
		?>

		<p align="right"><a href="admin.php"> click here to visit back </a></p>

</body>

</html>