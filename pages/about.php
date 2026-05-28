<?php
require_once 'settings.php';

$members = [];
$db_error = "";
mysqli_report(MYSQLI_REPORT_OFF);
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    $db_error = "Connection failed: " . mysqli_connect_error();
} else {
    $result = @mysqli_query($conn, "SELECT * FROM member_contributions ORDER BY id");
    if (!$result) {
        $db_error = "Query failed: " . mysqli_error($conn);
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $members[] = $row;
        }
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About the BookSmart Digital team">
    <meta name="keywords" content="Education, Jobs, About, Team, Tech">
    <meta name="author" content="Connor Taylor">
    <title>About — BookSmart Digital</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/about.css">
</head>

<body>

<?php include '../IncFiles/header.inc'; ?>

<main>
    <h1 style="margin-bottom:0.25rem;">About Us</h1>
    <p class="text-muted" style="margin-bottom:2rem;">Meet the team behind BookSmart Digital.</p>

    <div class="about-container">

        <section class="aboutboxes">
            <h1>The Team</h1>
            <ul>
                <li><strong>Group:</strong> Github Gooners</li>
                <li><strong>Class:</strong> Wednesday 10am</li>
                <li><strong>Unit:</strong> COS10026 Web Technology</li>
            </ul>
        </section>

        <section class="aboutboxes">
            <h1>Team Members</h1>

            <?php if ($db_error): ?>
                <p style="color:var(--danger);"><?php echo htmlspecialchars($db_error); ?></p>
            <?php elseif (!empty($members)): ?>
                <?php foreach ($members as $m): ?>
                <dl class="member">
                    <dt><?php echo htmlspecialchars($m['name']); ?></dt>
                    <dt><span class="student-id">ID: <?php echo htmlspecialchars($m['student_id']); ?></span></dt>
                    <dd class="quote">
                        <span lang="<?php echo htmlspecialchars($m['quote_lang']); ?>"><?php echo htmlspecialchars($m['quote']); ?></span><br>
                        <em><?php echo htmlspecialchars($m['quote_translation']); ?></em> — <?php echo htmlspecialchars($m['quote_source']); ?>
                    </dd>
                    <dd><strong>Project 1:</strong> <?php echo htmlspecialchars($m['project1_contribution']); ?></dd>
                    <dd><strong>Project 2:</strong> <?php echo htmlspecialchars($m['project2_contribution']); ?></dd>
                </dl>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No member contributions found in the database.</p>
            <?php endif; ?>
        </section>

        <section class="aboutboxes" style="flex: 1 1 100%; max-width: 100%;">
            <h1>Group Photo</h1>
            <figure>
                <img class="group-photo" src="../Images/Groupphoto.jpg" alt="Team group photo">
                <figcaption>Github Gooners — COS10026 Wednesday 10am</figcaption>
            </figure>
        </section>

        <section class="aboutboxes" style="flex: 1 1 100%; max-width: 100%;">
            <h1>Fun Facts</h1>
            <table class="fun-facts-table">
                <caption>Get to know the team</caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Dream Job</th>
                        <th>Coding Snack</th>
                        <th>Hometown</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cohen</td>
                        <td>Software Engineer</td>
                        <td>Chips</td>
                        <td>Melbourne</td>
                    </tr>
                    <tr>
                        <td>Oliver</td>
                        <td>Web Developer</td>
                        <td>Coffee</td>
                        <td>Melbourne</td>
                    </tr>
                    <tr>
                        <td>Connor</td>
                        <td>UI/UX Designer</td>
                        <td>Chocolate</td>
                        <td>Melbourne</td>
                    </tr>
                    <tr>
                        <td>Roman</td>
                        <td>Full Stack Developer</td>
                        <td>Energy Drink</td>
                        <td>Melbourne</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="aboutboxes" style="flex: 1 1 100%; max-width: 100%;">
            <h1>Acknowledgement of Country</h1>
            <p>We acknowledge the Wurundjeri Woi-wurrung people of the Kulin Nation as the Traditional Custodians of the land on which Swinburne University is situated in Hawthorn, Victoria. We pay our respects to their Elders past, present, and emerging, and recognise their continuing connection to land, water, and community.</p>
        </section>

    </div>
</main>

<?php include '../IncFiles/footer.inc'; ?>

</body>
</html>
