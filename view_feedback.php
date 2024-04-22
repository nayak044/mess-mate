<?php
session_start();
if (!isset($_SESSION['sess_user']) || !isset($_SESSION['role']) || $_SESSION['role'] != "mess_member") {
    header("location:index.php");
}
?>

<!doctype html>
<html>

<head>
    <title>View Feedback</title>
    <style>
        body {
            margin-top: 100px;
            margin-bottom: 100px;
            margin-right: 150px;
            margin-left: 80px;
            background-color: azure;
            color: #7B241C;
            font-family: verdana;
            font-size: 100%;
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

        h2 {
            color: black;
            font-family: verdana;
            font-size: 200%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        .logout {
            position: absolute;
            top: 50px;
            right: 50px;
        }
    </style>
</head>

<body>
    <h2>Feedback Forms</h2>
    <div class="logout">
        <form action="logout.php" method="post">
            <input type="submit" value="Log out">
        </form>
    </div>

    <?php
    $conn = mysqli_connect('localhost', 'root', 'AIDNITRA#P98', 'mess_management');
    $query = mysqli_query($conn, "SELECT * FROM Feedback");

    if (mysqli_num_rows($query) > 0) {
        echo '<table align="center" border="1px" style="width:800px; line-height:60px;">
                <tr>
                    <th style="background-color:#D7DBDD">Feedback ID</th>
                    <th style="background-color:#D7DBDD">Student ID</th>
                    <th style="background-color:#D7DBDD">Message</th>
                    <th style="background-color:#D7DBDD">Rating</th>
                    <th style="background-color:#D7DBDD">Date</th>
                </tr>';

        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>
                    <td>{$row['feedback_id']}</td>
                    <td>{$row['student_id']}</td>
                    <td>{$row['message']}</td>
                    <td>{$row['rating']}</td>
                    <td>{$row['date']}</td>
                </tr>";
        }
        echo '</table>';
    } else {
        echo "No feedback forms available.";
    }

    mysqli_close($conn);
    ?>
    <p align='right' ><a href="admin.php">Back to Admin Page</a></p>
</body>

</html>