<!doctype html>
<html>

<head>
    <title>Register</title>
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

        h2 {
            color: indigo;
            font-family: verdana;
            font-size: 100%;
        }
    </style>
</head>

<body>

    <center>
        <h1>REGISTER AN EMPLOYEE</h1>
    </center>

    <center>
        <h2>Registration Form</h2>
    </center>
    <form action="" method="POST">
        <legend>
            <fieldset>

                employee id : <input type="text" name="user"><br />
                employee first name : <input type="text" name="emp_first_name"><br />
                employee last name : <input type="text" name="emp_last_name"><br />
                designation_id : <input type="text" name="designation_id"><br />
                date of birth : <input type="date" name="d_o_b"><br />
                email_id : <input type="email" name="email_id"><br />
                hire date : <input type="date" name="hire_date"><br />
                house number : <input type="text" name="house_no"><br />
                street number : <input type="text" name="street_no"><br />
                street name : <input type="text" name="street_name"><br />
                city : <input type="text" name="city"><br />
                state : <input type="text" name="state"><br />
                pincode : <input type="text" name="pincode"><br />
                <input type="submit" value="Register" name="submit" />

            </fieldset>
        </legend>
    </form>
    <?php
    if (isset($_POST["submit"])) { // echo "hii";
        if (
            !empty($_POST['user']) && !empty($_POST['emp_last_name']) && !empty($_POST['emp_first_name']) && !empty($_POST['designation_id']) && !empty($_POST['email_id'])
            && !empty($_POST['d_o_b']) && !empty($_POST['hire_date']) && !empty($_POST['house_no']) && !empty($_POST['street_no']) && !empty($_POST['street_name'])
            && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['pincode'])
        ) {
            //echo "heya";
            $user = $_POST['user'];
            $emp_first_name = $_POST['emp_first_name'];
            $emp_last_name = $_POST['emp_last_name'];
            $designation_id = $_POST['designation_id'];
            $d_o_b = $_POST['d_o_b'];
            $email_id = $_POST['email_id'];
            $hire_date = $_POST['hire_date'];
            $house_no = $_POST['house_no'];
            $street_no = $_POST['street_no'];
            $street_name = $_POST['street_name'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $pincode = $_POST['pincode'];
            $con = mysqli_connect('localhost', 'root', 'AIDNITRA#P98', 'mess_management') or die(mysql_error());
            // mysql_select_db('mess_management') or die("cannot select DB");  
    
            $query = mysqli_query($con, "SELECT * FROM emp_details WHERE emp_id='" . $user . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows == 0) {    //echo "hello";
                $sql1 = "INSERT INTO emp_details(emp_id,first_name,last_name,designation_id,date_of_birth,email_id,hire_date,house_no,street_no,street_name,city,state,pincode) VALUES
	         ('$user','$emp_first_name','$emp_last_name','$designation_id','$d_o_b','$email_id','$hire_date','$house_no','$street_no','$street_name','$city','$state','$pincode')";

                $result = mysqli_query($con, $sql1);
                if ($result) {
                    echo "Employee details have been successfully registered.";
                } else {
                    echo "Failure!";
                }

            } else {
                echo "That employee_id already exists! Please enter a new id.";
            }

        } else {
            echo "All fields are required!";
        }
    }
    ?>

    <p align="right"><a href="admin.php">click here to visit back </a></p>

</body>

</html>