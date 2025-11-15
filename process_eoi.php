<?php
 $currentPage = 'process_eoi';
    $pageTitle = 'Nexora IT Solutions | Empowering Tomorrow\'s Technology';
include 'header.inc';

require_once 'settings.php'; 


if ($_SERVER['REQUEST_METHOD'] != 'POST' || empty($_POST)) {
    header("Location: apply.php");
    exit();
}

function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}


$jobref = sanitize($_POST['jobref'] ?? '');
$firstname = sanitize($_POST['firstname'] ?? '');
$lastname = sanitize($_POST['lastname'] ?? '');
$street = sanitize($_POST['street'] ?? '');
$suburb = sanitize($_POST['suburb'] ?? '');
$state = sanitize($_POST['state'] ?? '');
$postcode = sanitize($_POST['postcode'] ?? '');
$email = sanitize($_POST['email'] ?? '');
$phone = sanitize($_POST['phone'] ?? '');
$skill1 = sanitize($_POST['skill1'] ?? '');
$skill2 = sanitize($_POST['skill2'] ?? '');
$skill3 = sanitize($_POST['skill3'] ?? '');
$skill4 = sanitize($_POST['skill4'] ?? '');
$otherskills = sanitize($_POST['otherskills'] ?? '');

$errors = [];


if ($jobref == '' || $firstname == '' || $lastname == '' || $street == '' || $suburb == '' || $state == '' || $postcode == '' || $email == '' || $phone == '') {
    $errors[] = "All required fields must be filled.";
}

if (!preg_match("/^[A-Za-z0-9]{5}$/", $jobref)) {
    $errors[] = "Job Reference Number must be exactly 5 alphanumeric characters.";
}
if (!preg_match("/^[A-Za-z- ]{1,50}$/", $firstname) || !preg_match("/^[A-Za-z- ]{1,50}$/", $lastname)) {
    $errors[] = "Names can only contain letters, spaces or hyphens.";
}

$valid_states = ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"];
if (!in_array(strtoupper($state), $valid_states)) {
    $errors[] = "State must be one of: VIC, NSW, QLD, NT, WA, SA, TAS, ACT.";
}

if (!preg_match("/^[0-9]{4}$/", $postcode)) {
    $errors[] = "Postcode must be exactly 4 digits.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address format.";
}

if (!preg_match("/^[0-9 ]{8,12}$/", $phone)) {
    $errors[] = "Phone number must contain 8–12 digits only.";
}

if (!empty($errors)) {
    echo "<h2>Submission Error</h2>";
    echo "<p>Your EOI could not be submitted due to the following issues:</p><ul>";
    foreach ($errors as $error) {
        echo "<li>" . $error . "</li>";
    }
    echo "</ul><p>Please go back and correct the form.</p>";
    exit();
}

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("<p>Database connection failure: " . mysqli_connect_error() . "</p>");
}


mysqli_query($conn, $create_table_query);

$insert_query = "INSERT INTO eoi 
    (JobReferenceNumber, FirstName, LastName, StreetAddress, SuburbTown, State, Postcode,
     Email, Phone, Skill1, Skill2, Skill3, Skill4, OtherSkills)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $insert_query);
mysqli_stmt_bind_param($stmt, 'ssssssssssssss',
    $jobref, $firstname, $lastname, $street, $suburb, $state, $postcode,
    $email, $phone, $skill1, $skill2, $skill3, $skill4, $otherskills
);

if (mysqli_stmt_execute($stmt)) {
    $eoiNumber = mysqli_insert_id($conn);
    echo "<h2>EOI Submitted Successfully</h2>";
    echo "<p>Thank you, <strong>$firstname $lastname</strong>!</p>";
    echo "<p>Your Expression of Interest has been received.</p>";
    echo "<p><strong>Your EOI Number:</strong> $eoiNumber</p>";
    echo "<p>Status: New</p>";
} else {
    echo "<p>Error submitting your EOI: " . mysqli_error($conn) . "</p>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
include 'footer.inc';
?>
