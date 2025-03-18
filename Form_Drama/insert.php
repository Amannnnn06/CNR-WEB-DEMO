<?php
include 'db.php';

$Interest = $_POST['interest'];
$SchlPlay = $_POST['school-play'];
$SchlText = ($SchlPlay === 'yes' && isset($_POST['schoolText'])) ? $_POST['schoolText'] : NULL;
$Outside =$_POST['outside-production'];
$OutText =($Outside === 'yes' && isset($_POST['outsideText'])) ? $_POST['outsideText'] : NULL;
$light =$_POST['lighting'];
$Sound=$_POST['sound'];
$SET=$_POST['set-construction'];
$costume =$_POST['costume'];
$Stage=$_POST['stage-management'];
$Backstage = $_POST['backstage'];
$BackText = ($Backstage === 'yes' && isset($_POST['BackstageText'])) ? $_POST['BackstageText'] : NULL;
$Dance = $_POST['dance-acting'];
$DanceText = ($Dance === 'yes' && isset($_POST['danceText'])) ? $_POST['danceText'] : NULL;

// Convert to JSON
$form_data = json_encode([
    'interest' => $Interest,
    'school-play' => $SchlPlay,
    'schoolText' => $SchlText,
    'outside-production' => $Outside,
    'outsideText' => $OutText,
    'lighting' => $light,
    'sound' => $Sound,
    'set-construction' => $SET,
    'costume' => $costume,
    'stage-management' => $Stage,
    'backstage' => $Backstage,
    'BackstageText' => $BackText,
    'dance-acting' => $Dance,
    'danceText' => $DanceText
], JSON_UNESCAPED_UNICODE);

if ($form_data === false) {
    die("JSON Encoding Error: " . json_last_error_msg()); // Display error message
}


// Check if record exists
$sql_check = "SELECT id FROM form_drama LIMIT 1";
$result = mysqli_query($conn, $sql_check);
$record = mysqli_fetch_assoc($result);

if ($record) {
    $ex_id = $record['id'];
    $sql = "UPDATE form_drama SET form_data = '$form_data', updated_date = NOW() WHERE id = $ex_id";
} else {
    $sql = "INSERT INTO form_drama (pupil_id,form_data,created_date, updated_date ) 
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