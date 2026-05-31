<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$_SESSION["error"] = NULL;

require_once("settings.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Database connection failed.");
}

$sort = "EOInumber";

if (isset($_GET["sort"])) {
    $allowed = ["job_ref", "first_name", 'last_name', "dob", "gender", "street_address", "suburb_town", "state", "postcode", "email", "phone_number", "skills", "other_skills", "status"];

    if (in_array($_GET["sort"], $allowed)) {
        $sort = $_GET["sort"];
    }
}


if (isset($_POST["delete_job_ref"])) {

    $job_ref = trim($_POST["delete_job_ref"]);

    $delete_sql = "DELETE FROM eoi WHERE job_ref='$job_ref'";

    mysqli_query($conn, $delete_sql);

    echo "<p>Records deleted successfully.</p>";
}


if (isset($_POST["eoi_number"]) && isset($_POST["status"])) {

    $eoi_number = $_POST["eoi_number"];
    $status = $_POST["status"];

    $update_sql = "UPDATE eoi
                   SET status='$status'
                   WHERE EOInumber='$eoi_number'";

    mysqli_query($conn, $update_sql);

    echo "<p>Status updated successfully.</p>";
}


$query = "SELECT * FROM eoi";


if (isset($_GET["job_ref"]) && $_GET["job_ref"] != "") {

    $job_ref = trim($_GET["job_ref"]);

    $query = "SELECT * FROM eoi
              WHERE job_ref='$job_ref'
              ORDER BY $sort";
}


elseif (
    isset($_GET["first_name"]) ||
    isset($_GET["last_name"])
) {

    $first = trim($_GET["first_name"]);
    $last = trim($_GET["last_name"]);

    $query = "SELECT * FROM eoi
              WHERE first_name LIKE '%$first%'
              AND last_name LIKE '%$last%'
              ORDER BY $sort";
}


else {
    $query .= " ORDER BY $sort";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage EOIs</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>

<?php
    include '../IncFiles/header.inc';
?>

<h1>HR Management</h1>

<p>
    Logged in as:
    <?php echo $_SESSION["username"]; ?>
</p>

<p>
    <a href="logout.php">Logout</a>
</p>

<hr>

<h2>List by Job Reference</h2>

<form action="manage.php" method="get">

    <input type="text" name="job_ref">

    <input type="submit" value="Search">

</form>

<hr>

<h2>Search by Applicant Name</h2>

<form action="manage.php" method="get">

    First Name:
    <input type="text" name="first_name">

    Last Name:
    <input type="text" name="last_name">

    <input type="submit" value="Search">

</form>

<hr>

<h2>Delete EOIs by Job Reference</h2>

<form action="manage.php" method="post">

    Job Reference:
    <input type="text" name="delete_job_ref">

    <input type="submit" value="Delete">

</form>

<hr>

<h2>Change EOI Status</h2>

<form action="manage.php" method="post">

    EOI Number:
    <input type="number" name="eoi_number">

    Status:
    <select name="status">
        <option value="New">New</option>
        <option value="Current">Current</option>
        <option value="Final">Final</option>
    </select>

    <input type="submit" value="Update">

</form>

<hr>

<h2>Sort Results</h2>

<form action="manage.php" method="get">

    <select name="sort">
        <option value="EOInumber">EOI Number</option>
        <option value="job_ref">Job Reference</option>
        <option value="first_name">First Name</option>
        <option value="last_name">Last Name</option>
        <option value="status">Status</option>
    </select>

    <input type="submit" value="Sort">

</form>

<hr>

<h2>EOI Records</h2>

<table border="1">

<tr>
    <th>EOI Number</th>
    <th>Job Ref</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>DOB</th>
    <th>Gender</th>
    <th>Street Address</th>
    <th>Suburb/Town</th>
    <th>State</th>
    <th>Postcode</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Skills</th>
    <th>Other Skills</th>
    <th>Status</th>
</tr>

<?php

if ($result && mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";

        echo "<td>" . $row["EOInumber"] . "</td>";
        echo "<td>" . $row["job_ref"] . "</td>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["street_address"] . "</td>";
        echo "<td>" . $row["suburb_town"] . "</td>";
        echo "<td>" . $row["state"] . "</td>";
        echo "<td>" . $row["postcode"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "<td>" . $row["skills"] . "</td>";
        echo "<td>" . $row["other_skills"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";

        echo "</tr>";
    }
}
else {
    echo "<tr><td colspan='15'>No records found.</td></tr>";
}

mysqli_close($conn);
?>

</table>

<?php include '../IncFiles/footer.inc';
?>
</body>
</html>