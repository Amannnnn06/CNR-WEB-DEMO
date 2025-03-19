<?php
include 'db.php';

$confi = $_POST['confidential'];
$Detail = ($confi === 'yes' && !empty($_POST['details'])) ? $_POST['details'] : null;

$form_data = json_encode([
    'confidential' => $confi,
    'details' => $Detail
], JSON_UNESCAPED_UNICODE);

if ($form_data === false) {
    die("Error encoding JSON");
}

$sql_check = "SELECT id FROM form_confident LIMIT 1";
$result = mysqli_query($conn, $sql_check);

if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}

$record = mysqli_fetch_assoc($result);

if ($record) {
    $ex_id = $record['id'];

    $sql = "UPDATE form_confident 
            SET form_data = '$form_data', updated_date = NOW() 
            WHERE id = $ex_id";
} else {
    $sql = "INSERT INTO form_confident (pupil_id, form_data, created_date, updated_date) 
            VALUES (1, '$form_data', NOW(), NOW())";
}
if (mysqli_query($conn, $sql)) {
    // echo "Record saved successfully!";
    header('Location: index.php');
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>