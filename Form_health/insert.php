<?php



include 'conn.php';

echo '<pre>';
print_r($_POST);   // shows text fields
print_r($_FILES);  // shows file uploads
echo '</pre>';

$PreviousSchool = $_POST['previousSchool'];
$FamilyDoctor = $_POST['familyDoctor'];
$GpAddress = $_POST['gpAddress'];
$GpPhone = $_POST['gpPhone'];
$IhsNumber = $_POST['ihsNumber'];
$NhsNumber = $_POST['nhsNumber'];
$aDHD = $_POST['ADHD'];
$aDHD_diagnosis = ($aDHD === 'yes' && isset($_POST['ADHD-diagnosis'])) ? $_POST['ADHD-diagnosis'] : NULL;
$aDHD_trig = ($aDHD === 'yes' && isset($_POST['ADHD-trig'])) ? $_POST['ADHD-trig'] : NULL;
$aDHD_ongoing = ($aDHD === 'yes' && isset($_POST['ADHD-ongoing'])) ? $_POST['ADHD-ongoing'] : NULL;
$Autism = $_POST['autism'];
$Autism_diagnosis = ($Autism === 'yes' && isset($_POST['autism-diagnosis'])) ? $_POST['autism-diagnosis'] : NULL;
$Autism_trig = ($Autism === 'yes' && isset($_POST['autism-trig'])) ? $_POST['autism-trig'] : NULL;
$Autism_ongoing = ($Autism === 'yes' && isset($_POST['autism-ongoing'])) ? $_POST['autism-ongoing'] : NULL;
$Allergy = $_POST['allergy'];
$Allergy_diagnosis = ($Allergy === 'yes' && isset($_POST['allergy-diagnosis'])) ? $_POST['allergy-diagnosis'] : NULL;
$Allergy_trig = ($Allergy === 'yes' && isset($_POST['allergy-trig'])) ? $_POST['allergy-trig'] : NULL;
$Allergy_ongoing = ($Allergy === 'yes' && isset($_POST['allergy-ongoing'])) ? $_POST['allergy-ongoing'] : NULL;
$Asthma = $_POST['asthma'];
$Asthma_diagnosis = ($Asthma === 'yes' && isset($_POST['asthma-diagnosis'])) ? $_POST['asthma-diagnosis'] : NULL;
$Asthma_trig = ($Asthma === 'yes' && isset($_POST['asthma-trig'])) ? $_POST['asthma-trig'] : NULL;
$Asthma_ongoing = ($Asthma === 'yes' && isset($_POST['asthma-ongoing'])) ? $_POST['asthma-ongoing'] : NULL;
$Bed = $_POST['bed'];
$Bed_diagnosis = ($Bed === 'yes' && isset($_POST['bed-diagnosis'])) ? $_POST['bed-diagnosis'] : NULL;
$Bed_trig = ($Bed === 'yes' && isset($_POST['bed-trig'])) ? $_POST['bed-trig'] : NULL;
$Bed_ongoing = ($Bed === 'yes' && isset($_POST['bed-ongoing'])) ? $_POST['bed-ongoing'] : NULL;
$Pox = $_POST['pox'];
$Pox_diagnosis = ($Pox === 'yes' && isset($_POST['pox-diagnosis'])) ? $_POST['pox-diagnosis'] : NULL;
$Pox_trig = ($Pox === 'yes' && isset($_POST['pox-trig'])) ? $_POST['pox-trig'] : NULL;
$Pox_ongoing = ($Pox === 'yes' && isset($_POST['pox-ongoing'])) ? $_POST['pox-ongoing'] : NULL;
$Dental = $_POST['dental'];
$Dental_diagnosis = ($Dental === 'yes' && isset($_POST['dental-diagnosis'])) ? $_POST['dental-diagnosis'] : NULL;
$Dental_trig = ($Dental === 'yes' && isset($_POST['dental-trig'])) ? $_POST['dental-trig'] : NULL;
$Dental_ongoing = ($Dental === 'yes' && isset($_POST['dental-ongoing'])) ? $_POST['dental-ongoing'] : NULL;
$Diabetes = $_POST['diabetes'];
$Diabetes_diagnosis = ($Diabetes === 'yes' && isset($_POST['diabetes-diagnosis'])) ? $_POST['diabetes-diagnosis'] : NULL;
$Diabetes_trig = ($Diabetes === 'yes' && isset($_POST['diabetes-trig'])) ? $_POST['diabetes-trig'] : NULL;
$Diabetes_ongoing = ($Diabetes === 'yes' && isset($_POST['diabetes-ongoing'])) ? $_POST['diabetes-ongoing'] : NULL;
$Eat = $_POST['eating'];
$Eat_diagnosis = ($Eat === 'yes' && isset($_POST['eating-diagnosis'])) ? $_POST['eating-diagnosis'] : NULL;
$Eat_trig = ($Eat === 'yes' && isset($_POST['eating-trig'])) ? $_POST['eating-trig'] : NULL;
$Eat_ongoing = ($Eat === 'yes' && isset($_POST['eating-ongoing'])) ? $_POST['eating-ongoing'] : NULL;
$Ear = $_POST['ear'];
$Ear_diagnosis = ($Ear === 'yes' && isset($_POST['ear-diagnosis'])) ? $_POST['ear-diagnosis'] : NULL;
$Ear_trig = ($Ear === 'yes' && isset($_POST['ear-trig'])) ? $_POST['ear-trig'] : NULL;
$Ear_ongoing = ($Ear === 'yes' && isset($_POST['ear-ongoing'])) ? $_POST['ear-ongoing'] : NULL;
$Epilepsy = $_POST['epilepsy'];
$Epilepsy_diagnosis = ($Epilepsy === 'yes' && isset($_POST['epilepsy-diagnosis'])) ? $_POST['epilepsy-diagnosis'] : NULL;
$Epilepsy_trig = ($Epilepsy === 'yes' && isset($_POST['epilepsy-trig'])) ? $_POST['epilepsy-trig'] : NULL;
$Epilepsy_ongoing = ($Epilepsy === 'yes' && isset($_POST['epilepsy-ongoing'])) ? $_POST['epilepsy-ongoing'] : NULL;
$Hay = $_POST['hay'];
$Hay_diagnosis = ($Hay === 'yes' && isset($_POST['hay-diagnosis'])) ? $_POST['hay-diagnosis'] : NULL;
$Hay_trig = ($Hay === 'yes' && isset($_POST['hay-trig'])) ? $_POST['hay-trig'] : NULL;
$Hay_ongoing = ($Hay === 'yes' && isset($_POST['hay-ongoing'])) ? $_POST['hay-ongoing'] : NULL;
$Heart = $_POST['heart'];
$Heart_diagnosis = ($Heart === 'yes' && isset($_POST['heart-diagnosis'])) ? $_POST['heart-diagnosis'] : NULL;
$Heart_trig = ($Heart === 'yes' && isset($_POST['heart-trig'])) ? $_POST['heart-trig'] : NULL;
$Heart_ongoing = ($Heart === 'yes' && isset($_POST['heart-ongoing'])) ? $_POST['heart-ongoing'] : NULL;
$Kidney = $_POST['kidney'];
$Kidney_diagnosis = ($Kidney === 'yes' && isset($_POST['kidney-diagnosis'])) ? $_POST['kidney-diagnosis'] : NULL;
$Kidney_trig = ($Kidney === 'yes' && isset($_POST['kidney-trig'])) ? $_POST['kidney-trig'] : NULL;
$Kidney_ongoing = ($Kidney === 'yes' && isset($_POST['kidney-ongoing'])) ? $_POST['kidney-ongoing'] : NULL;
$Mental = $_POST['mental'];
$Mental_diagnosis = ($Mental === 'yes' && isset($_POST['mental-diagnosis'])) ? $_POST['mental-diagnosis'] : NULL;
$Mental_trig = ($Mental === 'yes' && isset($_POST['mental-trig'])) ? $_POST['mental-trig'] : NULL;
$Mental_ongoing = ($Mental === 'yes' && isset($_POST['mental-ongoing'])) ? $_POST['mental-ongoing'] : NULL;
$Poor = $_POST['poor'];
$Poor_diagnosis = ($Poor === 'yes' && isset($_POST['poor-diagnosis'])) ? $_POST['poor-diagnosis'] : NULL;
$Poor_trig = ($Poor === 'yes' && isset($_POST['poor-trig'])) ? $_POST['poor-trig'] : NULL;
$Poor_ongoing = ($Poor === 'yes' && isset($_POST['poor-ongoing'])) ? $_POST['poor-ongoing'] : NULL;
$Aware = $_POST['aware'];
$Aware_text = ($Aware === 'yes' && isset($_POST['aware-text'])) ? $_POST['aware-text'] : NULL;
$Aware = $_POST['aware'];
$Aware_text = ($Aware === 'yes' && isset($_POST['aware-text'])) ? $_POST['aware-text'] : NULL;
$Fit = $_POST['fit'];
$Fit_text = ($Fit === 'yes' && isset($_POST['fit-text'])) ? $_POST['fit-text'] : NULL;
$Epi = $_POST['epi'];
$Epi_med = $_POST['epi-med'];
$Epi_med_name = ($Epi_med === 'yes' && isset($_POST['med-name'])) ? $_POST['med-name'] : NULL;
$Epi_med_dos = ($Epi_med === 'yes' && isset($_POST['dosage'])) ? $_POST['dosage'] : NULL;
$Epi_med_reason = ($Epi_med === 'yes' && isset($_POST['reason'])) ? $_POST['reason'] : NULL;
$Epi_med_date = ($Epi_med === 'yes' && isset($_POST['review-date'])) ? $_POST['review-date'] : NULL;
$Vaccination = $_POST['vaccination'];
$Vaccination_text = ($Vaccination === 'no' && isset($_POST['vaccination-text'])) ? $_POST['vaccination-text'] : NULL;
$Intolerance = $_POST['intolerance'];
$Intolerance_text = ($Intolerance === 'yes' && isset($_POST['intolerance-text'])) ? $_POST['intolerance-text'] : NULL;
$Restrictions = $_POST['restrictions'];
$Restrictions_text = ($Restrictions === 'yes' && isset($_POST['restrictions-text'])) ? $_POST['restrictions-text'] : NULL;

$Emergency_treatment = $_POST['emergency-treatment'];
$First_aid = $_POST['first-aid'];
$Prescribed_medications = $_POST['prescribed-medications'];
$Otc_medications = $_POST['otc-medications'];
$Health_wellbeing_info = $_POST['health-wellbeing-info'];
$Mental_health_info = $_POST['mental-health-info'];
$Medical_needs_update = $_POST['medical-needs-update'];

$Sign = $_POST['sign'];
$Sign_text = ($Sign === 'yes' && isset($_POST['sign-text'])) ? $_POST['sign-text'] : NULL;


$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($Vaccination === 'yes' && isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK) {
    $fileName = time() . '_' . basename($_FILES['uploaded_file']['name']);
    $targetFilePath = $uploadDir . $fileName;

    $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf'];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($fileType, $allowedTypes)) {
        die('Error: Invalid file type.');
    }

    if ($_FILES['uploaded_file']['size'] > 2 * 1024 * 1024) { // 2MB limit
        die('Error: File size exceeds 2MB.');
    }
    


    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $targetFilePath)) {
        $filePath = $targetFilePath;
    } else {
        $filePath = null;
    }
} else {
    $filePath = null;
}




// Convert to JSON
$form_data = json_encode([

    'previousSchool' => $PreviousSchool,
    'familyDoctor' => $FamilyDoctor,
    'gpAddress' => $GpAddress,
    'gpPhone' => $GpPhone,
    'ihsNumber' => $IhsNumber,
    'nhsNumber' => $NhsNumber,


    'ADHD' => $aDHD,
    'ADHD_diagnosis' => $aDHD_diagnosis,
    'ADHD_trig' => $aDHD_trig,
    'ADHD_ongoing' => $aDHD_ongoing,

    'autism' => $Autism,
    'autism_diagnosis' => $Autism_diagnosis,
    'autism_trig' => $Autism_trig,
    'autism_ongoing' => $Autism_ongoing,

    'allergy' => $Allergy,
    'allergy_diagnosis' => $Allergy_diagnosis,
    'allergy_trig' => $Allergy_trig,
    'allergy_ongoing' => $Allergy_ongoing,

    'asthma' => $Asthma,
    'asthma_diagnosis' => $Asthma_diagnosis,
    'asthma_trig' => $Asthma_trig,
    'asthma_ongoing' => $Asthma_ongoing,

    'bed' => $Bed,
    'bed_diagnosis' => $Bed_diagnosis,
    'bed_trig' => $Bed_trig,
    'bed_ongoing' => $Bed_ongoing,

    'pox' => $Pox,
    'pox_diagnosis' => $Pox_diagnosis,
    'pox_trig' => $Pox_trig,
    'pox_ongoing' => $Pox_ongoing,

    'dental' => $Dental,
    'dental_diagnosis' => $Dental_diagnosis,
    'dental_trig' => $Dental_trig,
    'dental_ongoing' => $Dental_ongoing,

    'diabetes' => $Diabetes,
    'diabetes_diagnosis' => $Diabetes_diagnosis,
    'diabetes_trig' => $Diabetes_trig,
    'diabetes_ongoing' => $Diabetes_ongoing,

    'eating' => $Eat,
    'eating_diagnosis' => $Eat_diagnosis,
    'eating_trig' => $Eat_trig,
    'eating_ongoing' => $Eat_ongoing,

    'ear' => $Ear,
    'ear_diagnosis' => $Ear_diagnosis,
    'ear_trig' => $Ear_trig,
    'ear_ongoing' => $Ear_ongoing,

    'epilepsy' => $Epilepsy,
    'epilepsy_diagnosis' => $Epilepsy_diagnosis,
    'epilepsy_trig' => $Epilepsy_trig,
    'epilepsy_ongoing' => $Epilepsy_ongoing,

    'hay' => $Hay,
    'hay_diagnosis' => $Hay_diagnosis,
    'hay_trig' => $Hay_trig,
    'hay_ongoing' => $Hay_ongoing,

    'heart' => $Heart,
    'heart_diagnosis' => $Heart_diagnosis,
    'heart_trig' => $Heart_trig,
    'heart_ongoing' => $Heart_ongoing,

    'kidney' => $Kidney,
    'kidney_diagnosis' => $Kidney_diagnosis,
    'kidney_trig' => $Kidney_trig,
    'kidney_ongoing' => $Kidney_ongoing,

    'mental' => $Mental,
    'mental_diagnosis' => $Mental_diagnosis,
    'mental_trig' => $Mental_trig,
    'mental_ongoing' => $Mental_ongoing,

    'poor' => $Poor,
    'poor_diagnosis' => $Poor_diagnosis,
    'poor_trig' => $Poor_trig,
    'poor_ongoing' => $Poor_ongoing,


    'aware' => $Aware,
    'aware_text' => $Aware_text,

    'fit' => $Fit,
    'fit_text' => $Fit_text,


    'epi' => $Epi,
    'epi_med' => $Epi_med,
    'epi_med_name' => $Epi_med_name,
    'epi_med_dosage' => $Epi_med_dos,
    'epi_med_reason' => $Epi_med_reason,
    'epi_med_review_date' => $Epi_med_date,


    'vaccination' => $Vaccination,
    'uploaded_file' => $filePath,
    'vaccination_text' => $Vaccination_text,


    'intolerance' => $Intolerance,
    'intolerance_text' => $Intolerance_text,

    'restrictions' => $Restrictions,
    'restrictions_text' => $Restrictions_text,

    'emergency_treatment' => $Emergency_treatment,
    'first_aid' => $First_aid,
    'prescribed_medications' => $Prescribed_medications,
    'otc_medications' => $Otc_medications,
    'health_wellbeing_info' => $Health_wellbeing_info,
    'mental_health_info' => $Mental_health_info,
    'medical_needs_update' => $Medical_needs_update,


    'sign' => $Sign,
    'sign_text' => $Sign_text



], JSON_UNESCAPED_UNICODE);


if ($form_data === false) {
    die("JSON Encoding Error: " . json_last_error_msg()); // Display error message
}


// Check if record exists
$sql_check = "SELECT id FROM health_care LIMIT 1";
$result = mysqli_query($conn, $sql_check);
$record = mysqli_fetch_assoc($result);

if ($record) {
    $ex_id = $record['id'];
    $sql = "UPDATE health_care SET form_data = '$form_data', updated_date = NOW() WHERE id = $ex_id";
} else {
    $sql = "INSERT INTO health_care (pupil_id,form_data,created_date, updated_date ) 
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