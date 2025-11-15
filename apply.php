<?php
    $currentPage = 'apply';
    $pageTitle = 'Apply | Nexora IT Solutions Careers';
    
    require_once 'settings.php';
    
   $dbconn = mysqli_connect($host, $username, $password, $database);
if (!$dbconn) {
    $error_message = "Database connection failed: " . mysqli_connect_error();
    $jobs = [];
} else {    
    $query = "SELECT * FROM eoi WHERE status='New' ORDER BY JobReferenceNumber";
    $result = mysqli_query($dbconn, $query);
    if ($result) {
        $jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error_message = "Error retrieving job listings: " . mysqli_error($dbconn);
        $jobs = [];
    }
}

?>
<?php include 'header.inc'; ?>

   
        <div class="wrapper">
            <h1>Submit Your Application</h1>
            <p>Complete the form below to express interest in Nexora opportunities. Required fields ensure we can evaluate your strengths promptly.</p> <!-- AI Generated content -->
        </div>
    </header>

    <main>
        <section class="application-section" aria-labelledby="apply-heading">
            <div class="wrapper application-wrap">
                <h2 id="apply-heading">Candidate Details</h2>
               
                <form class="application-form" action="process_eoi.php" method="post" novalidate="novalidate">
                    <div>
                        <label for="ref-number">Job Reference Number</label>
                        <select id="ref-number" name="reference" required>
                            <option value="" disabled selected>Select a reference</option>
                            <?php foreach ($jobs as $job): ?>
                                <option value="<?= htmlspecialchars($job['reference']) ?>"><?= htmlspecialchars($job['reference']) ?> &mdash; <?= htmlspecialchars($job['title']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="first-name">First Name</label>
                  
                        <input id="first-name" name="first-name" type="text" maxlength="20" pattern="[A-Za-z]{1,20}" required>
                    </div>
                    <div>
                        <label for="last-name">Last Name</label>
                        <input id="last-name" name="last-name" type="text" maxlength="20" pattern="[A-Za-z]{1,20}" required>
                    </div>
                    <div>
                        <label for="dob">Date of Birth</label>
                        <input id="dob" name="dob" type="date" required>
                    </div>
                    <fieldset>
                        <legend>Gender</legend>
                        <label><input type="radio" name="gender" value="female" required> Female</label>
                        <label><input type="radio" name="gender" value="male" required> Male</label>
                        <label><input type="radio" name="gender" value="nonbinary" required> Non-binary</label>
                        <label><input type="radio" name="gender" value="unspecified" required> Prefer not to say</label>
                    </fieldset>
                    <div>
                        <label for="street">Street Address</label>
                        <input id="street" name="street" type="text" maxlength="40" required>
                    </div>
                    <div>
                        <label for="suburb">Suburb / Town</label>
                        <input id="suburb" name="suburb" type="text" maxlength="40" required>
                    </div>
                    <div>
                        <label for="state">State</label>
                        <select id="state" name="state" required>
                            <option value="" disabled selected>Select state</option>
                            <option value="VIC">VIC</option>
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="NT">NT</option>
                            <option value="WA">WA</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="ACT">ACT</option>
                        </select>
                    </div>
                    <div>
                        <label for="postcode">Postcode</label>
                        <input id="postcode" name="postcode" type="text" inputmode="numeric" pattern="\d{4}" maxlength="4" required title="Postcode must be exactly four digits.">
                    </div>
                    <div>
                        <label for="email">Email Address</label>
                        <input id="email" name="email" type="email" required pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" title="Enter a valid email address.">
                    </div>
                    <div>
                        <label for="phone">Phone Number</label>
                        <input id="phone" name="phone" type="text" pattern="[0-9 ]{8,12}" required title="Use 8-12 digits, spaces permitted.">
                    </div>
                    <fieldset>
                        <legend>Required Technical Skills</legend>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="skills" value="cloud" required> Cloud Architecture</label>
                            <label><input type="checkbox" name="skills" value="security"> Cybersecurity Operations</label>
                            <label><input type="checkbox" name="skills" value="data"> Data Engineering</label>
                            <label><input type="checkbox" name="skills" value="agile"> Agile Delivery Leadership</label>
                            <label><input type="checkbox" name="skills" value="other"> Other Skills</label>
                        </div>
                    </fieldset>
                    <div>
                        <label for="other-skills">Other Skills</label>
                        <textarea id="other-skills" name="other-skills" placeholder="Share any additional strengths or certifications."></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="submit">Apply</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

<?php include 'footer.inc'; ?>