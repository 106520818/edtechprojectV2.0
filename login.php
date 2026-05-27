<?php

session_start();
require_once("settings.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Database connection failed.");
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {

        if (password_verify($password, $row["password"])) {

            $_SESSION["username"] = $username;

            header("Location: manage.php");
            exit();
        }
    }

    $error = "Invalid username or password.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manager Login</title>
</head>

<body>

<h1>HR Manager Login</h1>

<form action="login.php" method="post" novalidate>

    <p>
        Username:
        <input type="text" name="username" required>
    </p>

    <p>
        Password:
        <input type="password" name="password" required>
    </p>

    <input type="submit" value="Login">

</form>

<p><?php echo $error; ?></p>

</body>
</html>