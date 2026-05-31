<?php
    session_start();
    require_once("settings.php");
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <!-- metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="Sign up form for Book Smart Digital">
    <meta name="keywords" content="form, jobs, apply">
    <meta name="author" content="Roman Young">
    <title>Ed Tech Digital: Apply</title>
    <!-- stylesheet(s) -->
    <link rel="stylesheet" href="../styles/styles.css">
    <style>
        h2,
        h3,
        p,
        legend,
        label {
            color: #49336f;
        }
    </style>
</head>



<body>

<?php include '../IncFiles/header.inc';?>
    
<?php
    if ($_SESSION['apply_status']) {
        echo('<p>Your application has been registered! Would you like to <a href="apply.php" target="_self">apply for another role</a> or <a href="index.php" target="_self">head to the homepage</a>?</p>');
    } else {
        echo('<p>Something went wrong, <a href="apply.php" target="_blank">try again?</a></p>');
    }
?>

<?php include '../IncFiles/footer.inc';?>

</body>

</html>
