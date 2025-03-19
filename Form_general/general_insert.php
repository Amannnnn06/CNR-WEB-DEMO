<?php
include 'db.php';

// Gather POST data with fallback defaults
$emergency_first_name   = $_POST['full_name'];
$emergency_relationship = $_POST['relation'];
$emergency_phone        = $_POST['telephone'];
$Emergency              = $_POST['emergency'];
$emergency_Permision    = $_POST['permission_collect'];

$other     = $_POST['other_care_provider'];
$careText  = ($other === 'yes' && !empty($_POST['careText'])) ? $_POST['careText'] : null;
$sunscreen = $_POST['sunscreen'];
$milk      = $_POST['milk'];
$handedness= $_POST['handedness'];
$clean_child = $_POST['clean_child'];

$Nappy_not_applicable = $_POST['nappy_not_applicable'] ?? '';
$Nappy                = $_POST['nappy'] ?? '';
$Wipes                = $_POST['wipes'] ?? '';
$Cream                = $_POST['cream'] ?? '';
$Parent_requirements  = $_POST['parent_requirements'] ?? '';

$Family_details     = $_POST['family_details'];
$Lavatory_help      = $_POST['lavatory_help'];
$Toilet             = $_POST['toilet'];
$Daily_routines     = $_POST['daily_routines'];
$Emotional_social   = $_POST['emotional_social'];
$Communication_lang = $_POST['communication_lang'];
$Literacy           = $_POST['literacy'];
$Physical           = $_POST['physical'];
$Additional_info    = $_POST['additional_info'];

// Prepare form data as JSON
$form_array = [
    'first_name'           => $emergency_first_name,
    'relation'             => $emergency_relationship,
    'telephone'            => $emergency_phone,
    'emergency'            => $Emergency,
    'permission_collect'   => $emergency_Permision,
    'other_care_provider'  => $other,
    'careText'             => $careText,
    'sunscreen'            => $sunscreen,
    'milk'                 => $milk,
    'handedness'           => $handedness,
    'clean_child'          => $clean_child,
    'nappy_not_applicable' => $Nappy_not_applicable,
    'nappy'                => $Nappy,
    'wipes'                => $Wipes,
    'cream'                => $Cream,
    'parent_requirements'  => $Parent_requirements,
    'family_details'       => $Family_details,
    'lavatory_help'        => $Lavatory_help,
    'toilet'               => $Toilet,
    'daily_routines'       => $Daily_routines,
    'emotional_social'     => $Emotional_social,
    'communication_lang'   => $Communication_lang,
    'literacy'             => $Literacy,
    'physical'             => $Physical,
    'additional_info'      => $Additional_info
];

$form_data = json_encode($form_array, JSON_UNESCAPED_UNICODE);

if ($form_data === false) {
    die("JSON Encoding Error: " . json_last_error_msg());
}

// Escape JSON string for SQL query to prevent breaking due to quotes
$form_data_escaped = mysqli_real_escape_string($conn, $form_data);

// Check if record exists
$sql_check = "SELECT id FROM form_general LIMIT 1";
$result = mysqli_query($conn, $sql_check);
$record = mysqli_fetch_assoc($result);

// Update or Insert query
if ($record) {
    $ex_id = $record['id'];
    $sql = "UPDATE form_general 
            SET form_data = '$form_data_escaped', updated_date = NOW() 
            WHERE id = $ex_id";
} else {
    $sql = "INSERT INTO form_general (pupil_id, form_data, created_date, updated_date) 
            VALUES (1, '$form_data_escaped', NOW(), NOW())";
}

// Execute query and check result
if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
