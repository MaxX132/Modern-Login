<?php

$sname = "localhost";

$unmae = "admin";

$password = "admin";

$db_name = "simple-admin-panel";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}

?>