<?php
    session_start();
    require_once("settings.php");
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $input_username = trim($_POST["username"]);
        $input_password = trim($_POST["password"]);

        // prepared statement to avoid sql injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $input_username, $input_password);
        $stmt->execute();
        $result = $stmt->get_result();

        $user = mysqli_fetch_assoc($result);

        if ($user) {
            $_SESSION["username"] = $input_username;
            $_SESSION["error"] = NULL;
            header("Location: manage.php");
            exit();
        } else {
            $error = "Invalid username or password.";
            $_SESSION["error"] = $error;
            header("Location: login.php");
        }
    }
?>