<!doctype html>
<html>

<head>
    <title>Login</title>
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
        <h1>CREATE REGISTRATION AND LOGIN FORM USING PHP AND MYSQL</h1>
    </center>
    <p><a href="sturegister.php">Register</a> | <a href="stulogin.php">Login</a></p>
    <h3>Login Form</h3>
    <form action="" method="POST">
        Username: <input type="text" name="user"><br />
        Password: <input type="password" name="pass"><br />
        <input type="submit" value="Login" name="submit" />
    </form>
    <?php
    if (isset($_POST["submit"])) {

        if (!empty($_POST['user']) && !empty($_POST['pass'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $host = "localhost";
            $root = "root";
            $password = "AIDNITRA#P98";
            $db = "mess_management";
            $con = mysqli_connect($host, $root, $password, $db);
            //or die(mysql_error());  
            //mysql_select_db('mess_management') or die("cannot select DB");  
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                //you need to exit the script, if there is an error
                exit();
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