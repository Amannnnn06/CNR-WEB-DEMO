<?php
include 'db_connection.php';
include 'create_table.php';
$sql_check = "SELECT * FROM pupil limit 1";
$queryResult = mysqli_query($conn, $sql_check);
$existRecord = '';
if (mysqli_num_rows($queryResult) > 0) {
    $fetchRow = $queryResult->fetch_assoc();
    if (!empty($fetchRow) && isset($fetchRow['form_data']) && !empty($fetchRow['form_data'])) {
        $existRecord = json_decode($fetchRow['form_data'], true);
    }
}
include 'validation.php';
// echo '<pre>';
// print_r($existRecord);
// exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asthma Diagnosis Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">
        <h1>Asthma Diagnosis Form</h1>
        <form action="insert_medical.php" method="POST">
            <input type="hidden" name="id" id="id" value="<!-- ID of the existing record -->">

            <div class="form-group">
                <label>Asthma <span class="required">*</span>:</label>
                <input <?= (isset($existRecord['asthma']) && $existRecord['asthma'] == 'yes') ? 'checked' : '' ?>
                    type="radio" name="asthma" value="yes" required> Yes
                <input <?= (isset($existRecord['asthma']) && $existRecord['asthma'] == 'no') ? 'checked' : '' ?>
                    type="radio" name="asthma" value="no"> No
            </div>


            <div id="asthmaDetails" <?= (isset($existRecord['asthma']) && $existRecord['asthma'] == 'yes') ? '' : 'style="display: none;"' ?>>
                <div class="form-row">
                    <div class="form-group">
                        <label>Diagnosis Month / Year <span class="required">*</span>:</label>
                        <input
                            value="<?= (isset($existRecord['diagnosis_date']) && !empty($existRecord['diagnosis_date'])) ? $existRecord['diagnosis_date'] : '' ?>"
                            type="month" name="diagnosis_date" min="2000-05" max="2025-03">
                    </div>
                    <div class="form-group">
                        <label>Trigger / Symptoms / Current Treatments <span class="required">*</span>:</label>
                        <textarea name="symptoms"
                            minlength="10"><?= (isset($existRecord['symptoms']) && !empty($existRecord['symptoms'])) ? $existRecord['symptoms'] : '' ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label>Ongoing? <span class="required">*</span>:</label>
                    <input type="radio" name="ongoing" value="yes" <?= (isset($existRecord['ongoing']) && $existRecord['ongoing'] == 'yes') ? 'checked' : '' ?>> Yes
                    <input type="radio" name="ongoing" value="no" <?= (isset($existRecord['ongoing']) && $existRecord['ongoing'] == 'no') ? 'checked' : '' ?>> No
                </div>

                <div class="form-group" id="totalYearsGroup" <?= (isset($existRecord['ongoing']) && $existRecord['ongoing'] == 'yes') ? '' : ' style="display: none;"' ?>>
                    <label>Total Years <span class="required">*</span>:</label>
                    <input type="date" name="total_years"
                        value="<?= (isset($existRecord['total_years']) && !empty($existRecord['total_years'])) ? $existRecord['total_years'] : '' ?>"
                        max="<?= date('Y-m-d') ?>" min="1900-01-01" required>
                </div>

                <hr>

                <div class="form-group">
                    <label>My child has been diagnosed with asthma and has been prescribed an inhaler <span
                            class="required">*</span>:</label>
                    <input <?= (isset($existRecord['child_asthma']) && $existRecord['child_asthma'] == 'yes') ? 'checked' : '' ?> type="radio" name="child_asthma" value="yes"> Yes
                    <input <?= (isset($existRecord['child_asthma']) && $existRecord['child_asthma'] == 'no') ? 'checked' : '' ?> type="radio" name="child_asthma" value="no"> No
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Diagnosis Month / Year <span class="required">*</span>:</label>
                        <input
                            value="<?= (isset($existRecord['child_diagnosis_date']) && !empty($existRecord['child_diagnosis_date'])) ? $existRecord['child_diagnosis_date'] : '' ?>"
                            type="month" name="child_diagnosis_date" min="2000-05" max="2025-03">
                    </div>
                    <div class="form-group">
                        <label>Symptoms / Current Treatments <span class="required">*</span>:</label>
                        <textarea name="child_symptoms"
                            minlength="10"><?= (isset($existRecord['child_symptoms']) && !empty($existRecord['child_symptoms'])) ? $existRecord['child_symptoms'] : '' ?> </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label>Ongoing? <span class="required">*</span>:</label>
                    <input type="radio" name="child_ongoing" value="yes" id="child_ongoing_yes"
                        <?= (isset($existRecord['child_ongoing']) && $existRecord['child_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes
                    <input type="radio" name="child_ongoing" value="no" id="child_ongoing_no"
                        <?= (isset($existRecord['child_ongoing']) && $existRecord['child_ongoing'] == 'no') ? 'checked' : '' ?>> No
                </div>

                <div class="form-group" id="childTotalYearsDiv" <?= (isset($existRecord['child_ongoing']) && $existRecord['child_ongoing'] == 'yes') ? '' : ' style="display: none;"' ?>>
                    <label>Total Years:</label>
                    <input type="date" name="child_ongoing_year" id="childTotalYears"
                        value="<?= (isset($existRecord['child_ongoing_year']) && !empty($existRecord['child_ongoing_year'])) ? $existRecord['child_ongoing_year'] : '' ?>"
                        required>
                </div>


                <div class="form-group">
                    <label>Name of child's consultant and/or clinical nurse specialist <span
                            class="required">*</span>:</label>
                    <input type="text" name="consultant_name" minlength="3" maxlength="50"
                        value="<?= (isset($existRecord['consultant_name']) && !empty($existRecord['consultant_name'])) ? $existRecord['consultant_name'] : '' ?>">
                </div>

                <div class="form-group">
                    <label>Contact details <span class="required">*</span>:</label>
                    <input type="text" name="contact_details" minlength="10" maxlength="15"
                        value="<?= (isset($existRecord['contact_details']) && !empty($existRecord['contact_details'])) ? $existRecord['contact_details'] : '' ?>">
                </div>
            </div>

            <button type="submit">Submit</button>
            <div id="responseMessage"></div>
        </form>

    </div>

    <script src="script.js">

    </script>

</body>

</html>