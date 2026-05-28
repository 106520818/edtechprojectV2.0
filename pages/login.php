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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Login — BookSmart Digital</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>

<?php include '../IncFiles/header.inc'; ?>

<main>
    <div class="form-card">
        <h1>Manager Login</h1>

        <?php if (isset($_GET['error'])): ?>
            <p style="color:var(--danger);margin-bottom:1rem;">Incorrect username or password.</p>
        <?php endif; ?>

        <form action="process.php" method="post">
            <p>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required autocomplete="username">
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required autocomplete="current-password">
            </p>
            <input type="submit" value="Log In" style="width:100%;margin-top:0.5rem;">
        </form>
    </div>
</main>

<?php include '../IncFiles/footer.inc'; ?>

</body>
</html>
