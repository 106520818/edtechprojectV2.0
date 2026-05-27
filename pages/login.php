<?php
session_start();

//if (isset($_SESSION["username"])) {
//    header("Location: manage.php");
//    exit();
//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manager Login</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
<!-- TODO: Update to .inc file -->
<!-- TODO: Add error message for incorrect username/password -->
    <header> 
        <?php
            include '../IncFiles/header.inc';
        ?>
    </header>

    <main>
        <h1>HR Manager Login</h1>

        <form action="process.php" method="post" novalidate>
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

    <?php include 'IncFiles/footer.inc'; ?>
</body>

</html>