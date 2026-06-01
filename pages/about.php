<?php
require_once 'settings.php';

$members      = [];
$content      = [];
$fun_facts    = [];
$fact_columns = [];
$db_error     = "";

mysqli_report(MYSQLI_REPORT_OFF);
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    $db_error = "Connection failed: " . mysqli_connect_error();
} else {
    $r1 = @mysqli_query($conn, "SELECT * FROM member_contributions ORDER BY id");
    if (!$r1) {
        $db_error = "Query failed: " . mysqli_error($conn);
    } else {
        while ($row = mysqli_fetch_assoc($r1)) {
            $members[] = $row;
        }
    }

    $r2 = @mysqli_query($conn, "SELECT content_key, content_value FROM about_content");
    if ($r2) {
        while ($row = mysqli_fetch_assoc($r2)) {
            $content[$row['content_key']] = $row['content_value'];
        }
    }

    $r3 = @mysqli_query($conn,
        "SELECT member_name, fact_key, fact_value FROM member_fun_facts ORDER BY display_order ASC, member_name ASC");
    if ($r3) {
        while ($row = mysqli_fetch_assoc($r3)) {
            $name = $row['member_name'];
            $key  = $row['fact_key'];
            if (!isset($fun_facts[$name])) {
                $fun_facts[$name] = [];
            }
            $fun_facts[$name][$key] = $row['fact_value'];
            if (!in_array($key, $fact_columns)) {
                $fact_columns[] = $key;
            }
        }
    }

    mysqli_close($conn);
}

$group_name    = $content['group_name']               ?? 'Our Group';
$class_time    = $content['class_time']               ?? '';
$unit          = $content['unit']                     ?? '';
$photo_caption = $content['group_photo_caption']      ?? '';
$aoc_text      = $content['acknowledgement_of_country'] ?? '';
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
    <title>Booksmart Digital - About</title>
    <meta charset="UTF-8">
    <meta name="description" content="EdTech Project about page">
    <meta name="keywords" content="Education, Jobs, Applications, Home, Tech, Programmers, Designers">
    <meta name="author" content="Connor Taylor">

    <style>
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

            <section class="aboutboxes" style="flex: 1 1 100%; max-width: 100%;">
                <h1>About the team</h1>
                <p style="text-align:center; color:#03045E;">
                    <strong><?php echo htmlspecialchars($group_name); ?></strong>
                    &nbsp;·&nbsp; <?php echo htmlspecialchars($class_time); ?>
                    &nbsp;·&nbsp; <?php echo htmlspecialchars($unit); ?>
                </p>
            </section>

            <section class="aboutboxes" style="flex: 1 1 100%; max-width: 100%;">
                <h1>About us</h1>

                <?php if ($db_error): ?>
                    <p style="color:red;"><?php echo htmlspecialchars($db_error); ?></p>
                <?php elseif (!empty($members)): ?>
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap:1.2rem; margin-top:0.5rem;">
                    <?php foreach ($members as $m): ?>
                    <dl class="member" style="margin:0; padding:1rem; background:#f0f9ff; border-radius:12px; border:1px solid #90E0EF;">
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
                </div>
                <?php else: ?>
                    <p>No member contributions found in the database.</p>
                <?php endif; ?>
            </section>

            <section class="aboutboxes" style="flex: 1 1 100%; max-width: 100%;">
                <h1>Group photo</h1>
                <figure>
                    <img class="group-photo" src="../Images/Groupphoto.jpg" alt="Team group photo">
                    <figcaption><?php echo htmlspecialchars($photo_caption); ?></figcaption>
                </figure>
            </section>

            <section class="aboutboxes" style="flex: 1 1 100%; max-width: 100%;">
                <h1>Fun Facts</h1>
                <?php if (!empty($fun_facts) && !empty($fact_columns)): ?>
                <table class="fun-facts-table">
                    <caption>Get to know the team</caption>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <?php foreach ($fact_columns as $col): ?>
                                <th><?php echo htmlspecialchars($col); ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fun_facts as $name => $facts): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($name); ?></td>
                            <?php foreach ($fact_columns as $col): ?>
                                <td><?php echo htmlspecialchars(isset($facts[$col]) ? $facts[$col] : '—'); ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <p>No fun facts available.</p>
                <?php endif; ?>
            </section>

            <section class="aboutboxes" style="flex: 1 1 100%; max-width: 100%;">
                <h1>Acknowledgement of Country</h1>
                <p><?php echo htmlspecialchars($aoc_text); ?></p>
            </section>

        </div>
    </main>

<?php include '../IncFiles/footer.inc'; ?>

</body>
</html>
