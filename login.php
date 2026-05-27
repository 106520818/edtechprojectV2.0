<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manager Login</title>
</head>

<body>

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

</body>
</html>