<?php
include 'db_con.php';

// Get form data
$first_language = $_POST['first_language'];
$multilingual = $_POST['multilingual'];
$languages_spoken = [];
$otherlanguages = $_POST['other-languages'];
$otherLang = ($otherlanguages === 'yes' && isset($_POST['other_lang'])) ? $_POST['other_lang'] : NULL;
$ealSupport = $_POST['eal-support'];
$Latin =$_POST['latin'];
$LatinYear =($Latin === 'yes' && isset($_POST['latinyear'])) ? $_POST['latinyear'] : NULL;
$French =$_POST['french'];
$FrenchYear =($French === 'yes' && isset($_POST['frenchyear'])) ? $_POST['frenchyear'] : NULL;
$Others=$_POST['others'];
$OtherText= ($Others === 'yes' && isset($_POST['other-text'])) ? $_POST['other-text'] : NULL;
$OtherText1= ($Others === 'yes' && isset($_POST['other-text1'])) ? $_POST['other-text1'] : NULL;
$Support =$_POST['support'];
$Support1 =($Support === 'yes' && isset($_POST['support-1'])) ? $_POST['support-1'] : NULL;
$Support2 =($Support === 'yes' && isset($_POST['support-2'])) ? $_POST['support-2'] : NULL;
$Exp=$_POST['experience'];
$Exp_detail = ( $Exp === 'yes' && isset($_POST['exp-detail'])) ? $_POST['exp-detail'] : NULL;
$Resources = $_POST['resources'];
$ResourcesCheck = [];

if ($Resources === "yes") {
    $resourcesList = ['resource_laptop', 'resource_writing_slope', 'resource_reader_scribe', 'resource_special_papers', 'resource_sensory', 'resource_other'];
    foreach ($resourcesList as $resource) {
        if (!empty($_POST[$resource])) {
            $ResourcesCheck[] = $_POST[$resource];
        }
    }
}

if ($multilingual === "yes") {
    $languages = ['eng', 'fren', 'germ', 'mand', 'russ', 'span', 'oth'];
    foreach ($languages as $lang) {
        if (!empty($_POST[$lang])) {
            $languages_spoken[] = $_POST[$lang];
        }
    }
}
if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    $fileName = basename($_FILES['uploaded_file']['name']);
    $targetFilePath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $targetFilePath)) {
        $filePath = $targetFilePath; // Store in JSON
    } else {
        $filePath = null;
    }
} else {
    $filePath = null;
}

// Convert to JSON
// Convert to JSON
$form_data = json_encode([
    'first_language' => $first_language,
    'multilingual' => $multilingual,
    'languages_spoken' => $languages_spoken,
    'other-languages'=>$otherlanguages,
    'other_lang' =>$otherLang,
    'eal-support'=>$ealSupport,
    'latin'=>$Latin,
    'latinyear'=>$LatinYear,
    'french'=>$French,
    'frenchyear'=>$FrenchYear,
    'others'=>$Others,
    'other-text'=>$OtherText,
    'other-text1'=>$OtherText1,
    'support'=>$Support,
    'support-1'=>$Support1,
    'support-2'=>$Support2,
    'experience'=>$Exp,
    'exp-detail'=>$Exp_detail,
    'uploaded_file' => $filePath,
    'resources'=>$Resources,
    'ResourcesCheck'=>$ResourcesCheck
], JSON_UNESCAPED_UNICODE);

if ($form_data === false) {
    die("JSON Encoding Error: " . json_last_error_msg()); // Display error message
}


// Check if record exists
$sql_check = "SELECT id FROM Lang_bg LIMIT 1";
$result = mysqli_query($conn, $sql_check);
$record = mysqli_fetch_assoc($result);

if ($record) {
    $ex_id = $record['id'];
    $sql = "UPDATE Lang_bg SET form_data = '$form_data', updated_date = NOW() WHERE id = $ex_id";
} else {
    $sql = "INSERT INTO Lang_bg (pupil_id,form_data,created_date, updated_date ) 
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
