<?php
include 'db_connection.php';

// Get form data
$asthma = $_POST['asthma'];
$diagnosis_date = !empty($_POST['diagnosis_date']) ? $_POST['diagnosis_date'] : NULL;
$symptoms = $_POST['symptoms'];
$ongoing = $_POST['ongoing'];
$total_years = (isset($_POST['total_years']) && !empty($_POST['total_years'])) ? $_POST['total_years'] : NULL;
$child_asthma = $_POST['child_asthma'];
$child_diagnosis_date = !empty($_POST['child_diagnosis_date']) ? $_POST['child_diagnosis_date'] : NULL;
$child_symptoms = $_POST['child_symptoms'];
$child_ongoing = $_POST['child_ongoing'];
$child_ongoing_year = ($child_ongoing === 'yes' && isset($_POST['child_ongoing_year'])) ? $_POST['child_ongoing_year'] : NULL;
$consultant_name = $_POST['consultant_name'];
$contact_details = $_POST['contact_details'];

$form_data = json_encode([
    'asthma' => $asthma,
    'diagnosis_date' => $diagnosis_date,
    'symptoms' => $symptoms,
    'ongoing' => $ongoing,
    'total_years' => $total_years,
    'child_asthma' => $child_asthma,
    'child_diagnosis_date' => $child_diagnosis_date,
    'child_symptoms' => $child_symptoms,
    'child_ongoing' => $child_ongoing,
    'child_ongoing_year' => $child_ongoing_year,
    'consultant_name' => $consultant_name,
    'contact_details' => $contact_details
], JSON_UNESCAPED_UNICODE);

if ($form_data === false) {
    die("Error encoding JSON");
}

// Check if any record exists
$sql_check = "SELECT id FROM pupil LIMIT 1";
$result = mysqli_query($conn, $sql_check);
$record = mysqli_fetch_assoc($result);

if ($record) {
    // If a record exists, update the existing one
    $ex_id = $record['id'];
    $sql = "UPDATE pupil SET form_data = '$form_data', updated_by = 'admin', updated_date = NOW() WHERE id = $ex_id";
} else {
    // No record exists, insert a new one
    $sql = "INSERT INTO pupil (pupil_id,parent_id, entry_year, form_data, created_date, created_by, updated_date, updated_by) 
            VALUES (1,1, 2025, '$form_data', NOW(), 'admin', NOW(), 'admin')";
}

// Execute query
if (mysqli_query($conn, $sql)) {
    header('Location: medical.php');
} else {
    echo "Error: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
