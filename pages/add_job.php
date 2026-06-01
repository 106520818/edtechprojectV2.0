<?php
require_once("settings.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $job_code = mysqli_real_escape_string($conn, $_POST['job_code']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $reporting_line = mysqli_real_escape_string($conn, $_POST['reporting_line']);
    $responsibilities = mysqli_real_escape_string($conn, $_POST['responsibilities']);
    $expectations = mysqli_real_escape_string($conn, $_POST['expectations']);
    $requirements = mysqli_real_escape_string($conn, $_POST['requirements']);

    $query = "
        INSERT INTO jobs
        (
            title,
            job_code,
            description,
            responsibilities,
            expectations,
            salary,
            reporting_line,
            requirements
        )
        VALUES
        (
            '$title',
            '$job_code',
            '$description',
            '$responsibilities',
            '$expectations',
            '$salary',
            '$reporting_line',
            '$requirements'
        )
    ";

    if(mysqli_query($conn, $query)){
        $message = "Job successfully added.";
    }
    else{
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Job Listing</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>

    <?php
    if($message != ""){
        echo "<p>$message</p>";
    }
    ?>

    <h1>Add New Job Listing</h1>

    <form action="add_job.php" method="post">

        <div class="add-job-container">

            <section class="add-job-section">

                <h2>Basic Information</h2>

                <label for="title">Job Title</label>
                <input type="text" id="title" name="title" required>

                <label for="job_code">Job Code</label>
                <input type="text" id="job_code" name="job_code" required>

                <label for="salary">Salary</label>
                <input type="number" id="salary" name="salary" required>

                <label for="reporting_line">Reporting Line</label>
                <input type="text" id="reporting_line" name="reporting_line" required>

            </section>

            <section class="add-job-section">

                <h2>Description</h2>

                <label for="description">Job Description</label>
                <textarea
                    id="description"
                    name="description"
                    required></textarea>

            </section>

            <section class="add-job-section">

                <h2>Responsibilities</h2>

                <label for="responsibilities">
                    Separate each item with commas
                </label>

                <textarea
                    id="responsibilities"
                    name="responsibilities"
                    required></textarea>

            </section>

            <section class="add-job-section">

                <h2>Expectations</h2>

                <label for="expectations">
                    Separate each item with commas
                </label>

                <textarea
                    id="expectations"
                    name="expectations"
                    required></textarea>

            </section>

            <section class="add-job-section">

                <h2>Requirements</h2>

                <label for="requirements">
                    Separate each item with commas
                </label>

                <textarea
                    id="requirements"
                    name="requirements"
                    required>
                </textarea>

            </section>

        </div>

        <div class="add-job-actions">

            <a href="manage.php" class="back-button">
                Back to Admin Page
            </a>

            <input
                type="submit"
                value="Add Job Listing"
                class="submit-button">

        </div>

    </form>

</body>
</html>