<!doctype html>
<html>

<head>
    <title>ADD A DESIGNATION</title>
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
    <p align="right"><a href="index.php">log out </a></p>

    <center>
        <h1>ADD A DESIGNATION</h1>
    </center>

    <form action="" method="POST">
        <legend>
            <fieldset>

                designation_id : <input type="text" name="designation_id"><br />
                job : <input type="text" name="job"><br />
                working_days : <input type="text" name="working_days"><br />
                salary : <input type="text" name="salary"><br />

                <input type="submit" name="Add_job_details" value="Add_job_details" />

            </fieldset>
        </legend>
    </form>
    <?php
    if (isset($_POST["Add_job_details"])) {
        echo "helo";
        if (!empty($_POST['designation_id']) && !empty($_POST['job']) && !empty($_POST['working_days']) && !empty($_POST['salary'])) {
            echo "hii";
            $designation_id = $_POST['designation_id'];
            $job = $_POST['job'];
            $working_days = $_POST['working_days'];
            $salary = $_POST['salary'];

            $con = mysqli_connect('localhost', 'root', 'AIDNITRA#P98', 'mess_management') or die(mysql_error());
            // mysql_select_db('user_login_registration') or die("cannot select DB");  
    
            $query = mysqli_query($con, "SELECT * FROM designation_details WHERE designation_id='" . $designation_id . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows == 0) {
                $sql1 = "INSERT INTO designation_details(designation_id,job,working_days,salary) VALUES
	         ('$designation_id','$job','$working_days','$salary')";

                $result = mysqli_query($con, $sql1);
                if ($result) {
                    echo "New Job details have been successfully registered.";
                } else {
                    echo ("Error description: " . mysqli_error($con));
                    echo "<br>";
                    echo "Failure!";
                }

            } else {
                echo "This designation_id already exists! Please enter a new id.";
            }

        } else {
            echo "All fields are required!";
        }
    }
    ?>

    <p align="right"><a href="admin.php">click here to visit back </a></p>

</body>

</html>