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
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $input_username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // validating hashed password
        if (password_verify($input_password, $user['password'])) {
            $_SESSION["username"] = $input_username;
            $_SESSION["error"] = NULL;
            header("Location: manage.php");
            exit();
        } else {
            $error = "Invalid username or password.";
            $_SESSION["error"] = $error;
            header("Location: login.php");
            exit();
        }
    }
?>