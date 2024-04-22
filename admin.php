<?php
session_start();
?>

<!doctype html>
<html>

<head>
    <title>admin page</title>
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
    echo "Welcome to admin page ...";
    echo "<br>";
    echo "admin - ";


    echo $_SESSION['sess_user'];
    echo "<br>";
    ?>
    <h3>STUDENT :</h3>
    <a href="sturegister.php">Click here to register a student</a><br>
    <a href="remove_stu.php">Click here to remove a student</a><br>
    <a href="stu_details_table.php">Click here to view student details</a><br><br><br>
    <h3>EMPLOYEE :</h3>
    <a href="register_emp.php">Click here to register an employee</a><br>
    <a href="remove_emp.php">Click here to remove an employee</a><br>
    <a href="emp_details_table.php">Click here to view employee details</a><br>
    <a href="update_leaves.php">Click here to update no. of leaves of an employee</a><br><br><br>
    <h3>MESS MENU:</h3>
    <a href="messmenu2.php">Click here to view mess menu</a></br>
    <a href="change_menu.php">Click here to change mess menu</a><br><br><br>
    <h3>JOB DETAILS :</h3>
    <a href="view_job.php">Click here to view job details</a><br>
    <a href="add_designation.php">Click here to add new job details</a><br><br><br>
    <h3>STOCK DETAILS :</h3>
    <a href="available_stock_table.php">Click here to view available stock details</a><br>
    <a href="used_stock_table.php">Click here to view used stock details</a><br>
    <a href="add_into_new_stock.php">Click here to update new stock details</a><br>
    <a href="add_into_used_stock.php">Click here to update used stock details</a><br><br><br>
    <h3>DETAILS OF REGISTERED COUPONS :</h3>
    <a href="view_coupons_registered.php">Click here to view the details of coupons registered by students</a><br>






</body>

</html>