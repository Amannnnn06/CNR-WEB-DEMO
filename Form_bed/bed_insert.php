<?php
include 'connn.php';

$Purchase = $_POST['purchase'];
$Under = ($Purchase === 'yes' && isset($_POST['understand'])) ? $_POST['understand'] : NULL;

$form_data = json_encode([
    'purchase'=>$Purchase,
    'understand'=>$Under

], JSON_UNESCAPED_UNICODE);

if ($form_data === false) {
    die("JSON Encoding Error: " . json_last_error_msg()); 
}

// print_r($form_data);
// exit;
$sql_check = "SELECT id FROM form_bed  LIMIT 1";
$result = mysqli_query($conn, $sql_check);
$record = mysqli_fetch_assoc($result);

if ($record) {
    $ex_id = $record['id'];
    $sql = "UPDATE form_bed SET form_data = '$form_data', updated_date = NOW() WHERE id = $ex_id";
} else {
    $sql = "INSERT INTO  form_bed(pupil_id,form_data,created_date, updated_date ) 
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
