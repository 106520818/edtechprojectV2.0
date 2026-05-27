<?php
$host = "localhost";
$user = "root";
$pwd  = "";
$sql_db = "edtechv2";

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
<!--
Created: 01/04/2026
Last Edited: 15/04/2026
Authors: Connor Taylor, Roman Young
Description: About page
-->
<html lang="en">

<head>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/about.css">
    <title>Booksmart Digital - About</title>
    <meta charset="UTF-8">
    <meta name="description" content="EdTech Project about page">
    <meta name="keywords" content="Education, Jobs, Applications, Home, Tech, Programmers, Designers">
    <meta name="author" content="Connor Taylor">

    <style>
        footer {
            font-size: 20px;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: normal;
            column-gap: 50px;
            width: 100%;
            height: 80px;
            position: fixed;
            bottom: 0;
            background-color: #90E0EF;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .student-id {
            font-size: 0.85em;
            color: #0077B6;
            font-weight: normal;
            letter-spacing: 0.05em;
            background-color: #e0f4fb;
            display: inline-block;
            padding: 1px 6px;
            border-radius: 4px;
            border: 1px solid #0077B6;
        }

        figure {
            border: 3px solid #0077B6;
            border-radius: 10px;
            padding: 0.5em;
            margin: 0;
            background-color: #fff;
        }

        figcaption {
            text-align: center;
            font-style: italic;
            color: #03045E;
            margin-top: 0.4em;
            font-size: 0.9em;
        }

        .fun-facts-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0.5em;
        }

        .fun-facts-table caption {
            font-size: 1em;
            font-weight: bold;
            color: #03045E;
            margin-bottom: 0.5em;
        }

        .fun-facts-table th {
            background-color: #0077B6;
            color: #ffffff;
            padding: 0.6em 0.8em;
            text-align: left;
        }

        .fun-facts-table td {
            background-color: #CAF0F8;
            padding: 0.5em 0.8em;
            border-bottom: 1px solid #90E0EF;
        }

        .fun-facts-table tr:nth-child(even) td {
            background-color: #ADE8F4;
        }

        .fun-facts-table tr:hover td {
            background-color: #48CAE4;
            color: #03045E;
            cursor: default;
        }
    </style>
</head>

<body>

<?php
if (!@include('../IncFiles/header.inc')) {
    echo '<p style="color:red;">Header include failed</p>';
}
?>

    <main>
        <div class="about-container">

            <section class="aboutboxes">
                <h1>About the team</h1>
                <ul>
                    <li>Group name: Github Gooners
                        <ul>
                            <li>Class: Wednesday 10am</li>
                            <li>Unit: COS10026 Web Technology</li>
                        </ul>
                    </li>
                </ul>
            </section>

            <section class="aboutboxes">
                <h1>About us</h1>

                <?php if ($db_error): ?>
                    <p style="color:red;"><?php echo htmlspecialchars($db_error); ?></p>
                <?php elseif (!empty($members)): ?>
                    <?php foreach ($members as $m): ?>
                    <dl class="member">
                        <dt><?php echo htmlspecialchars($m['name']); ?></dt>
                        <dt><span class="student-id">Student ID: <?php echo htmlspecialchars($m['student_id']); ?></span></dt>
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
                <h1>Group photo</h1>
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
