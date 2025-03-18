<?php
include 'db.php';

// Get form data
$Applicable = isset($_POST['applicable']) ? $_POST['applicable'] : 'yes';
$transportSelections = isset($_POST['transport']) ? $_POST['transport'] : [];
$route_selection =$_POST['route-selection'];
$Pickpoint= $_POST['pickup-point'];
$Understand=$_POST['understand'];
$Confirm =$_POST['confirm'];



// Prepare form data as JSON
$form_data = json_encode([
    'applicable' => $Applicable,
    'transport' => $transportSelections,
    'route-selection'=>$route_selection,
    'pickup-point'=>$Pickpoint,
    'understand'=>$Understand,
    'confirm'=>$Confirm

], JSON_UNESCAPED_UNICODE);

if ($form_data === false) {
    die("JSON Encoding Error: " . json_last_error_msg()); // Display error message
}


// Check if record exists
$sql_check = "SELECT id FROM form_transport  LIMIT 1";
$result = mysqli_query($conn, $sql_check);
$record = mysqli_fetch_assoc($result);

if ($record) {
    $ex_id = $record['id'];
    $sql = "UPDATE form_transport SET form_data = '$form_data', updated_date = NOW() WHERE id = $ex_id";
} else {
    $sql = "INSERT INTO  form_transport (pupil_id,form_data,created_date, updated_date ) 
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
