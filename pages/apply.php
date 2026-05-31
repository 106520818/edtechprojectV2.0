<!DOCTYPE html>
<!--
Created: 01/04/2026
Last Edited: 01/04/2026
Authors: Roman Young
Description: Application page for Ed Tech Digital
-->

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
    <?php
        include '../IncFiles/header.inc';
    ?>
    <h1>Application Page</h1>
    <h2>Instructions:</h2>
    <h3 style="font-size: 0.9rem;">Please find the relevant <a href="jobs.php" target="_blank"
            style="color: #3A3DF8">Reference Number</a> for the role you would like to apply to, and then fill out the
        form in its entirety. We will process applications as soon as possible, but please be aware that there may be
        delays due to the high volume of requests.</h3>
    <form method="post" action="apply_process.php">
        <fieldset>
            <legend>Reference number</legend>
            <p>
                <label for="job_reference_number">Job reference number</label>
                <input type="text" name="job_ref" id="job_reference_number" required="required"
                    pattern="[a-zA-Z0-9]{5}" title="5 alphanumeric characters (a-z, A-Z , 0-9)">
            </p>
        </fieldset>
        <fieldset>
            <legend>Your details</legend>
            <p>
                <label for="given_name">Given Name</label>
                <input type="text" name="first_name" id="given_name" required="required" pattern="[a-zA-Z]{1,20}" title="Between 1 and 20 alphanumeric characters">
            </p>
            <p>
                <label for="family_name">Family Name</label>
                <input type="text" name="last_name" id="family_name" required="required" pattern="[a-zA-Z]{1,20}" title="Between 1 and 20 alphanumeric characters">
            </p>
            <p>
                <label for="dob">Date of birth</label>
                <input type="date" name="dob" id="dob" required="required">
            </p>
            <p>
                <input type="radio" name="gender" id="M_radio" value="M" required="required">
                <label for="M_radio">Male</label>
                <input type="radio" name="gender" id="F_radio" value="F" required="required">
                <label for="F_radio">Female</label>
                <input type="radio" name="gender" id="X_radio" value="X" required="required">
                <label for="X_radio">Other</label>
            </p>
            <p>
                <label for="street_address">Street Address</label>
                <input type="text" name="street_address" id="street_address" required="required"
                    pattern="[a-zA-Z0-9 ]{1,40}" title="Between 1 and 40 alphanumeric characters (and spaces)">
            </p>
            <p>
                <label for="suburb">Suburb/Town</label>
                <input type="text" name="suburb_town" id="suburb" required="required" pattern="[a-zA-Z ]{1,40}" title="Between 1 and 40 alphabetical characters (and spaces)">
            </p>
            <p>
                <label for="state">State</label>
                <select name="state" id="state">
                    <option value="">Please Select</option>
                    <option value="VIC">VIC</option>
                    <option value="NSW">NSW</option>
                    <option value="WA">WA</option>
                    <option value="QLD">QLD</option>
                    <option value="NA">NA</option>
                    <option value="TAS">TAS</option>
                    <option value="ACT">ACT</option>
                </select>
            </p>
            <p>
                <label for="postcode">Postcode</label>
                <input type="text" name="postcode" id="postcode" required="required" pattern="[0-9]{4}" title="4 numeric characters">
            </p>
            <p>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required="required">
            </p>
            <p>
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" required="required" pattern="[0-9]{8,12}" title="8-12 numeric characters">
            </p>
        </fieldset>
        <fieldset>
            <legend>Skills</legend>
            <div>
                <label for="leadership">Leadership</label>
                <input type="checkbox" id="leadership" name="skills_checklist[]" value="Leadership">
            </div>
            <div>
                <label for="teamwork">Teamwork</label>
                <input type="checkbox" id="teamwork" name="skills_checklist[]" value="Teamwork">
            </div>
            <div>
                <label for="communication">Communication</label>
                <input type="checkbox" id="communication" name="skills_checklist[]" value="Communication">
            </div>
            <div>
                <label for="graphic_design">Graphic Design</label>
                <input type="checkbox" id="graphic_design" name="skills_checklist[]" value="Graphic Design">
            </div>
            <div>
                <label for="web_dev">Website Development</label>
                <input type="checkbox" id="web_dev" name="skills_checklist[]" value="Website Development">
            </div>
            <p>
                <label for="other_skills">Other Skills</label>
                <input type="text" id="other_skills" name="other_skills">
            </p>
        </fieldset>
        <input type="hidden" name="status" value="New">
        <input type="submit" value="Register">
        <input type="reset" value="Reset Form">
    </form>
    <hr>
    <footer>
    <?php include '../IncFiles/footer.inc';
    ?>
    </footer>
</body>

</html>
