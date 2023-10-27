<?php

session_start();

include("db_conn.php");

if (isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['invite'])) {
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

    $email = validate($_POST['email']);

    $invite = validate($_POST['invite']);

    $sql = "SELECT * FROM invites WHERE invite='$invite'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if ($row['invite'] === $invite) {
            $invitedByID = $row['cratedByID'];

            $sql = "INSERT INTO users(username, password, email, `invitedByID`) VALUES ('$uname','$pass','$email','$invitedByID')";

            $result = mysqli_query($conn, $sql);

            $sql = "DELETE FROM `invites` WHERE invite='$invite'";

            $result = mysqli_query($conn, $sql);

            echo "Successfully Registered!";

            header("Location: ../index.php?error=Successfully registered, please login!");

            exit();

        } else {

            header("Location: ../index.php?error=Incorect invite code!");

            exit();

        }

    } else {

        header("Location: ../index.php?error=Incorect invite code!");

        exit();

    }

} else {

    header("Location: ../index.php");

    exit();

}
?>