<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Open job listings at BookSmart Digital">
    <meta name="keywords" content="jobs, edtech, listings">
    <meta name="author" content="Oliver Wisbey, Roman Young">
    <title>Jobs — BookSmart Digital</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/jobs_layout.css">
</head>

<body>

<?php
require_once("settings.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$search = "";

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

$query = "SELECT * FROM jobs WHERE title LIKE '%$search%'";
$result = mysqli_query($conn, $query);
?>

<?php include '../IncFiles/header.inc'; ?>

<main>
    <h1 style="margin-bottom:0.25rem;">Open Positions</h1>
    <p class="text-muted" style="margin-bottom:2rem;">Find your next role at BookSmart Digital.</p>

    <aside class="requirements-box">
        <h2>Requirements</h2>
        <p>The requirements of our positions can be negotiated, but it is preferred that you meet our specifications before applying.</p>
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
            $expectations     = explode(",", $row['expectations']);
            $requirements     = explode(",", $row['requirements']);
    ?>

    <section class="job-box">

        <div>
            <h2><?php echo htmlspecialchars($row['title']); ?></h2>
            <span class="job-code"><?php echo htmlspecialchars($row['job_code']); ?></span>
        </div>

        <div class="job-description">
            <p><?php echo htmlspecialchars($row['description']); ?></p>
        </div>

        <div class="job-salary">
            <h3>Salary</h3>
            <p>$<?php echo number_format($row['salary']); ?> / year</p>
            <h3 style="margin-top:0.75rem;">Reporting Line</h3>
            <p style="color:var(--text-muted);font-size:0.9rem;"><?php echo htmlspecialchars($row['reporting_line']); ?></p>
        </div>

        <div class="job-workflow">
            <h4>Responsibilities</h4>
            <ul>
                <?php foreach ($responsibilities as $item): ?>
                    <li><?php echo htmlspecialchars(trim($item)); ?></li>
                <?php endforeach; ?>
            </ul>
            <h4 style="margin-top:0.75rem;">Expectations</h4>
            <ol>
                <?php foreach ($expectations as $item): ?>
                    <li><?php echo htmlspecialchars(trim($item)); ?></li>
                <?php endforeach; ?>
            </ol>
        </div>

        <div class="job-requirements">
            <h3>Requirements</h3>
            <ul>
                <?php foreach ($requirements as $item): ?>
                    <li><?php echo htmlspecialchars(trim($item)); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

    </section>

    <?php
        }
    } else {
        echo "<p>No jobs currently available.</p>";
    }

    mysqli_close($conn);
    ?>

    </div>
</main>

<?php include '../IncFiles/footer.inc'; ?>

</body>
</html>
