<?php
include 'conn.php';

// Get form data
$School = $_POST['school'];
$Swimming = $_POST['swimming'];
$Stroke = ($Swimming === 'yes' && isset($_POST['stroke'])) ? $_POST['stroke'] : NULL;
$Specialist =$_POST['specialist'];
$Medical=$_POST['medical'];
// Convert to JSON
// Convert to JSON
$form_data = json_encode([

    'school'=>$School,
    'swimming'=>$Swimming,
    'stroke'=>$Stroke,
    'specialist'=>$Specialist,
    'medical'=>$Medical
], JSON_UNESCAPED_UNICODE);

if ($form_data === false) {
    die("JSON Encoding Error: " . json_last_error_msg()); // Display error message
}


// Check if record exists
$sql_check = "SELECT id FROM form_sport_boy  LIMIT 1";
$result = mysqli_query($conn, $sql_check);
$record = mysqli_fetch_assoc($result);

if ($record) {
    $ex_id = $record['id'];
    $sql = "UPDATE form_sport_boy SET form_data = '$form_data', updated_date = NOW() WHERE id = $ex_id";
} else {
    $sql = "INSERT INTO  form_sport_boy(pupil_id,form_data,created_date, updated_date ) 
            VALUES (1, '$form_data', NOW(), NOW())";
}

// Execute query
if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
