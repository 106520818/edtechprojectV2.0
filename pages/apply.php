<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apply for a role at BookSmart Digital">
    <meta name="keywords" content="form, jobs, apply">
    <meta name="author" content="Roman Young">
    <title>Apply — BookSmart Digital</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>

<?php include '../IncFiles/header.inc'; ?>

<main>
    <h1 style="margin-bottom:0.25rem;">Application Form</h1>
    <p class="text-muted" style="margin-bottom:0.5rem;">
        Find the relevant <a href="jobs.php">Reference Number</a> for the role you want, then complete the form below.
        We process applications as soon as possible — please allow for delays during high-volume periods.
    </p>

    <div class="form-card" style="max-width:640px;">
        <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php">

            <fieldset>
                <legend>Job Reference</legend>
                <p>
                    <label for="job_reference_number">Job reference number</label>
                    <input type="text" name="Job reference number" id="job_reference_number" required
                        pattern="[a-zA-Z0-9]{5}" title="5 alphanumeric characters (a-z, A-Z, 0-9)">
                </p>
            </fieldset>

            <fieldset>
                <legend>Your Details</legend>
                <p>
                    <label for="given_name">Given Name</label>
                    <input type="text" name="Given Name" id="given_name" required
                        pattern="[a-zA-Z]{1,20}" title="Between 1 and 20 alphabetical characters">
                </p>
                <p>
                    <label for="family_name">Family Name</label>
                    <input type="text" name="Family Name" id="family_name" required
                        pattern="[a-zA-Z]{1,20}" title="Between 1 and 20 alphabetical characters">
                </p>
                <p>
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="DOB" id="dob" required>
                </p>
                <p>
                    <label>Gender</label>
                    <span style="display:flex;gap:1.5rem;margin-top:0.4rem;">
                        <span class="checkbox-row">
                            <input type="radio" name="Gender" id="M_radio" value="M" required>
                            <label for="M_radio" style="margin-bottom:0;">Male</label>
                        </span>
                        <span class="checkbox-row">
                            <input type="radio" name="Gender" id="F_radio" value="F">
                            <label for="F_radio" style="margin-bottom:0;">Female</label>
                        </span>
                        <span class="checkbox-row">
                            <input type="radio" name="Gender" id="X_radio" value="X">
                            <label for="X_radio" style="margin-bottom:0;">Other</label>
                        </span>
                    </span>
                </p>
                <p>
                    <label for="street_address">Street Address</label>
                    <input type="text" name="Street Address" id="street_address" required
                        pattern="[a-zA-Z0-9 ]{1,40}" title="Between 1 and 40 alphanumeric characters">
                </p>
                <p>
                    <label for="suburb">Suburb / Town</label>
                    <input type="text" name="Suburb/Town" id="suburb" required
                        pattern="[a-zA-Z]{1,40}" title="Between 1 and 40 alphabetical characters">
                </p>
                <p>
                    <label for="state">State</label>
                    <select name="State" id="state">
                        <option value="">Please Select</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="WA">WA</option>
                        <option value="QLD">QLD</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                        <option value="NT">NT</option>
                    </select>
                </p>
                <p>
                    <label for="postcode">Postcode</label>
                    <input type="text" name="Postcode" id="postcode" required
                        pattern="[0-9]{4}" title="4 numeric characters">
                </p>
                <p>
                    <label for="email">Email Address</label>
                    <input type="email" name="Email" id="email" required>
                </p>
                <p>
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="Phone Number" id="phone_number" required
                        pattern="[0-9]{8,12}" title="8 to 12 numeric characters">
                </p>
            </fieldset>

            <fieldset>
                <legend>Skills</legend>
                <div class="checkbox-row">
                    <input type="checkbox" id="leadership" name="skills_checklist[]" value="Leadership">
                    <label for="leadership">Leadership</label>
                </div>
                <div class="checkbox-row">
                    <input type="checkbox" id="teamwork" name="skills_checklist[]" value="Teamwork">
                    <label for="teamwork">Teamwork</label>
                </div>
                <div class="checkbox-row">
                    <input type="checkbox" id="communication" name="skills_checklist[]" value="Communication">
                    <label for="communication">Communication</label>
                </div>
                <div class="checkbox-row">
                    <input type="checkbox" id="graphic_design" name="skills_checklist[]" value="Graphic Design">
                    <label for="graphic_design">Graphic Design</label>
                </div>
                <div class="checkbox-row">
                    <input type="checkbox" id="web_dev" name="skills_checklist[]" value="Website Development">
                    <label for="web_dev">Website Development</label>
                </div>
                <p style="margin-top:0.75rem;">
                    <label for="other_skills">Other Skills</label>
                    <input type="text" id="other_skills" name="Other Skills" placeholder="Any other relevant skills...">
                </p>
            </fieldset>

            <div style="display:flex;gap:0.75rem;margin-top:0.5rem;">
                <input type="submit" value="Submit Application">
                <input type="reset" value="Reset Form">
            </div>

        </form>
    </div>
</main>

<?php include '../IncFiles/footer.inc'; ?>

</body>
</html>
