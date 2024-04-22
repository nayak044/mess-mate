<!doctype html>
<html>

<head>
    <title>MESS MANAGEMENT SYSTEM</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 25%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        h1 {
            color: indigo;
            font-family: verdana;
            font-size: 300%;
        }

        h3 {
            color: indigo;
            font-family: verdana;
            font-size: 150%;
        }

        button {
            background-color: #2899D1;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 25%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 12px 0 6px 0;
        }

        img.avatar {
            width: 20%;
            border-radius: 10%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

        }
    </style>
</head>

<body>

    <legend>
        <fieldset>

            <center>
                <h1>MESS MANAGEMENT SYSTEM</h1></br>
            </center>
            <center>
                <h3> Login </h3>
            </center>


            <form align="center" action="" method="post">
                <div class="container">
                    <input type="text" placeholder="username" name="user"><br />
                    <input type="password" placeholder="password" name="pass"><br />
                </div>

                <button type="submit" name="submit">Login </button>
        </fieldset>
    </legend>
    <p align="center"> <a href="sturegister.php">Student Register</a></p>
    <hr>
    <p align="center"> <a href="register_emp.php">Employee Register</a></p>
    </form>
    <?php
    if (isset($_POST["submit"])) {



        if (!empty($_POST['user']) && !empty($_POST['pass'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $host = "localhost";
            $root = "root";
            $password = "";
            $db = "mess_management";
            $con = mysqli_connect($host, $root, $password, $db);
            //or die(mysql_error());  
            //mysql_select_db('mess_management') or die("cannot select DB");  
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                //you need to exit the script, if there is an error
                exit();
            }

            $query1 = mysqli_query($con, "select * from admin_details where admin_id = '" . $user . "' and admin_password = '" . $pass . "' ");
            $numrows1 = mysqli_num_rows($query1);

            if ($numrows1 != 0) {
                $row = mysqli_fetch_assoc($query1);
                $admin_user = $row['admin_id'];
                $admin_password = $row['admin_password'];

                if ($user == $admin_user && $pass == $admin_password) {
                    session_start();
                    $_SESSION['sess_user'] = $admin_user;
                    header("Location: admin.php");
                }

            }

            $query = mysqli_query($con, "SELECT * FROM stu_info WHERE student_id='" . $user . "' AND PASSWORD='" . $pass . "'", MYSQLI_STORE_RESULT);
            $numrows = mysqli_num_rows($query);
            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $dbusername = $row['student_id'];
                    $dbpassword = $row['PASSWORD'];
                }

                if ($user == $dbusername && $pass == $dbpassword) {
                    session_start();
                    $_SESSION['sess_user'] = $user;

                    /* Redirect browser */
                    header("Location: member.php");
                }
            } else {
                echo "Invalid username or password!";
            }

        } else {
            echo "All fields are required!";
        }
    }
    ?>


</body>

</html>