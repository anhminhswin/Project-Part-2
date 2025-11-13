<?php
$currentPage = 'jobs';
$pageTitle = 'Nexora Careers | Position Descriptions';
$additionalMeta = '<meta name="description" content="Open roles at Nexora IT Solutions with responsibilities and qualifications.">
    <meta name="robots" content="noindex,nofollow">';

require_once 'settings.php';

$dbconn = mysqli_connect($host, $username, $password, $database);
if (!$dbconn) {
    $error_message = "Database connection failed: " . mysqli_connect_error();
    $jobs = [];
} else {
    $query = "SELECT * FROM jobs WHERE status='Open' ORDER BY reference";
    $result = mysqli_query($dbconn, $query);
    if ($result) {
        $jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error_message = "Error retrieving job listings: " . mysqli_error($dbconn);
        $jobs = [];
    }
}

include 'header.inc';
?>

    <header role="banner">
        <div class="wrapper">
            <h1>Open Roles</h1>
            <p>Explore current opportunities at Nexora. Required fields on the application page help us evaluate your strengths promptly. Join an innovation-driven team delivering secure, scalable solutions for Vietnam's most ambitious enterprises.</p>
        </div>
    </header>

    <main>
        <section class="section" aria-labelledby="roles-heading">
            <div class="wrapper">
                <h2 id="roles-heading">Current Opportunities</h2>

                <aside class="jobs-aside" aria-label="Application process summary">
                    <h3>How We Hire</h3>
                    <ol>
                        <li>Submit your application via the Nexora portal.</li>
                        <li>Meet the hiring manager for a capability conversation.</li>
                        <li>Complete a collaborative challenge with the delivery squad.</li>
                    </ol>
                    <ul>
                        <li>We respond to every candidate.</li>
                        <li>Interviews accommodate accessibility needs.</li>
                    </ul>
                    <p><strong>Tip:</strong> Use reference numbers from each role when you apply.</p>
                </aside>

                <?php if (isset($error_message)): ?>
                    <div style="background-color: #ffe6e6; border: 1px solid #ff9999; padding: 20px; margin: 20px 0; border-radius: 5px;">
                        <p><?= $error_message ?></p>
                    </div>
                <?php endif; ?>

                <div class="jobs-grid">
                    <?php if (empty($jobs)): ?>
                        <p>No open positions available at this time. Please check back later.</p>
                    <?php else: ?>
                        <?php foreach ($jobs as $job): ?>
                            <article class="job-card" aria-labelledby="role-<?= strtolower($job['reference']) ?>">
                                <h3 id="role-<?= strtolower($job['reference']) ?>"><?= htmlspecialchars($job['title']) ?></h3>
                                <div class="job-meta">
                                    <span>Ref: <?= htmlspecialchars($job['reference']) ?></span>
                                    <span>Location: <?= htmlspecialchars($job['location']) ?></span>
                                    <span><?= htmlspecialchars($job['contract_type']) ?></span>
                                </div>
                                <p class="job-description"><?= htmlspecialchars($job['description']) ?></p>
                                <p><strong>Salary Range:</strong> <?= htmlspecialchars($job['salary_range']) ?></p>
                                <p><strong>Reports To:</strong> <?= htmlspecialchars($job['reports_to']) ?></p>
                                
                                <section>
                                    <h4>Key Responsibilities</h4>
                                    <ul>
                                        <?php 
                                        $responsibilities = explode('|', $job['key_responsibilities']);
                                        foreach ($responsibilities as $responsibility): 
                                        ?>
                                            <li><?= htmlspecialchars(trim($responsibility)) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </section>
                                
                                <section>
                                    <h4>Essential Qualifications</h4>
                                    <ul>
                                        <?php 
                                        $qualifications = explode('|', $job['essential_qualifications']);
                                        foreach ($qualifications as $qualification): 
                                        ?>
                                            <li><?= htmlspecialchars(trim($qualification)) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </section>
                                
                                <?php if (!empty($job['preferable_qualifications'])): ?>
                                    <section>
                                        <h4>Preferable</h4>
                                        <ul>
                                            <?php 
                                            $preferable = explode('|', $job['preferable_qualifications']);
                                            foreach ($preferable as $pref): 
                                            ?>
                                                <li><?= htmlspecialchars(trim($pref)) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </section>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
    <?php  if ($dbconn) { mysqli_close($dbconn); } ?>

<?php include 'footer.inc'; ?>