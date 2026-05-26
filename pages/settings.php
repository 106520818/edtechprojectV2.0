<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "edtechproject_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>