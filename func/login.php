<?php

session_start();

include("db_conn.php");

if (isset($_POST['uname']) && isset($_POST['pass'])) {
    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    }

    $uname = validate($_POST['uname']);

    $rawPass = validate($_POST['pass']);

    $pass = md5($rawPass);

    $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if ($row['username'] === $uname && $row['password'] === $pass) {

            echo "Logged in!";

            $_SESSION['user_name'] = $row['username'];

            $_SESSION['id'] = $row['id'];

            $_SESSION['invitedbyid'] = $row['invitedByID'];

            header("Location: ../home.php");

            exit();

        } else {

            header("Location: ../index.php?error=Incorect username or password!");

            exit();

        }

    } else {

        header("Location: ../index.php?error=Incorect username or password!");

        exit();

    }

} else {

    header("Location: ../index.php");

    exit();

}
?>