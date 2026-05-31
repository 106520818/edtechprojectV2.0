<?php
    session_start();
    require_once("settings.php");
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        if ($password == $row["password"]) {

            $_SESSION["username"] = $username;

            header("Location: manage.php");
            exit();
        }
    }

    $error = "Invalid username or password.";
    $_SESSION["error"] = $error;
    header("Location: login.php");
    }
?>


