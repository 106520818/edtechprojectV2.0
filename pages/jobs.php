<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="description" content="The jobs page for BookSmart Digital">
        <meta name="keywords" content="jobs, edtech, listings">
        <meta name="author" content="Oliver Wisbey, Roman Young">

        <title>Our Jobs</title>

        <link rel="stylesheet" type="text/css" href="../styles/jobs_layout.css">
        <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    </head>

    <body>

    <?php

    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    require_once("../settings.php");

    $search = "";

    if (isset($_GET['search'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
    }

    $query = "SELECT * FROM jobs 
            WHERE title LIKE '%$search%'";

    $result = mysqli_query($conn, $query);
    ?>

    <?php
    include '../IncFiles/header.inc';
    ?>

    <aside class="requirements-box">
        <h2>Requirements</h2>
        <p>
            The requirements of our positions can be negotiated but it is preferred
            that you meet our specifications before applying.
        </p>
    </aside>

    <form method="get" action="jobs.php" class="search-container">

        <input
            type="text"
            name="search"
            placeholder="Search job titles..."
            value="<?php echo htmlspecialchars($search); ?>">

        <button type="submit">Search</button>

    </form>

    <div class="jobs-container">

    <?php
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            $responsibilities = explode(",", $row['responsibilities']);
            $expectations = explode(",", $row['expectations']);
            $requirements = explode(",", $row['requirements']);
    ?>

    <section class="job-box">

        <h2><?php echo $row['title']; ?></h2>

        <aside class="job-code">
            <?php echo $row['job_code']; ?>
        </aside>

        <section class="job-description">
            <p><?php echo $row['description']; ?></p>
        </section>

        <section class="job-salary">
            <h3>Salary</h3>
            <p>$<?php echo number_format($row['salary']); ?> per year</p>

            <h3>Reporting Line</h3>
            <p><?php echo $row['reporting_line']; ?></p>
        </section>

        <section class="job-workflow">

            <h4>Your Responsibilities</h4>
            <ul>
                <?php
                foreach ($responsibilities as $item) {
                    echo "<li>$item</li>";
                }
                ?>
            </ul>

            <h4>Expectations</h4>
            <ol>
                <?php
                foreach ($expectations as $item) {
                    echo "<li>$item</li>";
                }
                ?>
            </ol>

        </section>

        <section class="job-requirements">

            <h3>Requirements</h3>

            <ul>
                <?php
                foreach ($requirements as $item) {
                    echo "<li>$item</li>";
                }
                ?>
            </ul>

        </section>

    </section>

    <?php
        }
    } else {
        echo "<p>No jobs currently available.</p>";
    }

    mysqli_close($conn);
    ?>

    </div>

    <?php include '../IncFiles/footer.inc';
        ?>

    </body>

</html>

