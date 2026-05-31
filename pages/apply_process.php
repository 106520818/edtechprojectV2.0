<?php
    session_start();
    require_once("settings.php");
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['skills_checklist'])) {
        $skills = implode(', ', $_POST['skills_checklist']);
    }

    $job_ref = trim($_POST['job_ref']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $dob = $_POST['dob'];
    $gender = trim($_POST['gender']);
    $street_address = trim($_POST['street_address']);
    $suburb_town = trim($_POST['suburb_town']);
    $state = $_POST['state'];
    $postcode = trim($_POST['postcode']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $other_skills = trim($_POST['other_skills']);
    $status = $_POST['status'];

    $query = "INSERT INTO eoi (job_ref, first_name, last_name, dob, gender, street_address, suburb_town, state, postcode, email, phone_number, skills, other_skills, status) VALUES ('$job_ref', '$first_name', '$last_name', '$dob', '$gender', '$street_address', '$suburb_town', '$state', '$postcode', '$email', '$phone_number', '$skills', '$other_skills', '$status')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['apply_status'] = true;
    } else {
        $_SESSION['apply_status'] = false;
    }

    header("Location: apply_result.php");

?>