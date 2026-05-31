<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: manage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manager Login</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>
    <?php
        include '../IncFiles/header.inc';
    ?>

    <main>
        <h1>HR Manager Login</h1>

        <?php 
        $error = $_SESSION["error"] ?? ""; // fallback operator (??)
        echo("<p id=error_message> $error </p>"); 
        ?>
        <form action="login_process.php" method="post" novalidate>
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
    </main>

    <?php include '../IncFiles/footer.inc'; ?>
</body>

</html>