<?php
include 'conn.php';

$lesson =$_POST['music_lessons'];
$Instrument = ($lesson === 'yes' && isset($_POST['instrument1'])) ? $_POST['instrument1'] : NULL;
if ($Instrument !== NULL) {
    $StandardReached = isset($_POST['standardReached']) ? $_POST['standardReached'] : '';
    $YearsLearning = isset($_POST['yearsLearning']) ? $_POST['yearsLearning'] : '';
    $ExamBoard = isset($_POST['examBoard']) ? $_POST['examBoard'] : '';
    $EnsembleMember = isset($_POST['ensembleMember']) ? $_POST['ensembleMember'] : 'no';
    $EnsembleDetails = ($EnsembleMember === 'yes' && isset($_POST['hire-detail'])) ? $_POST['hire-detail'] : '';
    $HireInstrument = isset($_POST['hireInstrument']) ? $_POST['hireInstrument'] : 'no';
}
$Instrument2 = ($lesson === 'yes' && isset($_POST['instrument2'])) ? $_POST['instrument2'] : NULL;
if ($Instrument !== NULL) {
    $StandardReached2 = isset($_POST['standardReached2']) ? $_POST['standardReached2'] : '';
    $YearsLearning2 = isset($_POST['yearsLearning2']) ? $_POST['yearsLearning2'] : '';
    $ExamBoard2 = isset($_POST['examBoard2']) ? $_POST['examBoard2'] : '';
    $EnsembleMember2 = isset($_POST['ensembleMember2']) ? $_POST['ensembleMember2'] : 'no';
    $EnsembleDetails2 = ($EnsembleMember2 === 'yes' && isset($_POST['hire-detail2'])) ? $_POST['hire-detail2'] : '';
    $HireInstrument2 = isset($_POST['hireInstrument2']) ? $_POST['hireInstrument2'] : 'no';
}
$group_class =$_POST['chek1'];
$Single_class=$_POST['chek2'];
$Certi=$_POST['certificate'];
$Agree=$_POST['agree'];

if ( $Certi === 'yes' && isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    $fileName = basename($_FILES['uploaded_file']['name']);
    $targetFilePath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $targetFilePath)) {
        $filePath = $targetFilePath; 
    } else {
        $filePath = null;
    }
} else {
    $filePath = null;
}

// $uploadDir = 'uploads/';
// if (!is_dir($uploadDir)) {
//     mkdir($uploadDir, 0777, true);
// }

// if ($Certi === 'yes' && isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK) {

//     // Clean the filename to avoid spaces and special chars
//     $originalName = preg_replace("/[^a-zA-Z0-9\.\-_]/", "", $_FILES['uploaded_file']['name']);
//     $fileName = time() . '_' . $originalName;
//     $targetFilePath = $uploadDir . '/' . $fileName;

//     $allowedTypes = ['jpg', 'jpeg', 'doc', 'docx', 'pdf'];
//     $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

//     if (!in_array($fileType, $allowedTypes)) {
//         die('Error: Invalid file type.');
//     }

//     if ($_FILES['uploaded_file']['size'] > 10 * 1024 * 1024) {
//         die('Error: File size exceeds 10MB.');
//     }

//     if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $targetFilePath)) {
//         $filePath = $targetFilePath;
//     } else {
//         $filePath = null;
//     }
// } else {
//     $filePath = null;
// }



$form_data = json_encode([
    'music_lessons'=>$lesson,
    'instrument1'=>$Instrument,
    'standardReached'=>$StandardReached,
    'yearsLearning'=>$YearsLearning,
    'examBoard'=>$ExamBoard,
    'ensembleMember'=>$EnsembleMember,
    'hire-detail'=>$EnsembleDetails,
    'hireInstrument'=>$HireInstrument,
    'instrument2'=>$Instrument2,
    'standardReached2'=>$StandardReached2,
    'yearsLearning2'=>$YearsLearning2,
    'examBoard2'=>$ExamBoard2,
    'ensembleMember2'=>$EnsembleMember2,
    'hire-detail2'=>$EnsembleDetails2,
    'hireInstrument2'=>$HireInstrument2,
    'chek1'=>$group_class,
    'chek2'=>$Single_class,
    'certificate'=>$Certi,
    'uploaded_file' => $filePath,
    'agree'=>$Agree
], JSON_UNESCAPED_UNICODE);

if ($form_data === false) {
    die("JSON Encoding Error: " . json_last_error_msg()); 
}
// Check if record exists
$sql_check = "SELECT id FROM music_demo  LIMIT 1";
$result = mysqli_query($conn, $sql_check);
$record = mysqli_fetch_assoc($result);

if ($record) {
    $ex_id = $record['id'];
    $sql = "UPDATE music_demo SET form_data = '$form_data', updated_date = NOW() WHERE id = $ex_id";
} else {
    $sql = "INSERT INTO  music_demo(pupil_id,form_data,created_date, updated_date ) 
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
