<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manager Login</title>
        <link rel="stylesheet" href="styles/styles.css">
</head>



<body>
    <a href="index.php">
        <img id=book_smart_logo src="Images/BookSmart_Digital_logo_CAF0F8_background.png"
            alt="BookSmart Digital Company Logo" title="To home page">
    </a>
    <nav>
        <ul>
            <li><a href="../pages/index.php" target="_self">Homepage</a></li>
            <li><a href="../pages/apply.php" target="_self">Applications</a></li>
            <li><a href="../pages/jobs.php" target="_self">Jobs</a></li>
            <li><a href="../pages/about.php" target="_self">About</a></li>
            <li><a href="login.php" target="_self">Manager Login</a></li>

        </ul>
    </nav>

    <form>
        <label for="search">Search:</label>
        <input type="text" id="search" name = "search" placeholder="jobs, about, etc.">
        <button type="submit">Search</button>
    </form>

    <h1 style="text-align: center;">BookSmart Digital</h1>

    <hr style="height: 3px; border: none; background-color: black;">

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

<?php 
include 'IncFiles/footer.inc';
?>

</body>
</html>