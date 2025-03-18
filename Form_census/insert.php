<?php
include 'db.php';

$census=$_POST['census'];
$hm=$_POST['hm_force'];

$form_data = json_encode([
    'census'=>$census,
    'hm_force'=>$hm
], JSON_UNESCAPED_UNICODE);
if ($form_data === false) {
    die("Error encoding JSON");
}

$sql_check = "SELECT id FROM census LIMIT 1";
$result = mysqli_query($conn, $sql_check);
$record = mysqli_fetch_assoc($result);

if ($record) {
  
    $ex_id = $record['id'];
    $sql = "UPDATE census SET form_data = '$form_data', updated_date = NOW() WHERE id = $ex_id";
} else {
   
    $sql = "INSERT INTO census (pupil_id, form_data, created_date, updated_date) 
            VALUES (1,'$form_data', NOW(), NOW())";
}

if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
} else {
    echo "Error: " . mysqli_error($conn);
}


mysqli_close($conn);

?>