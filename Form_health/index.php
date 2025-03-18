<?php
include 'create_table.php';
$sql_check = "SELECT * FROM health_care  limit 1";
$queryResult = mysqli_query($conn, $sql_check);
$existRecord = '';
if (mysqli_num_rows($queryResult) > 0) {
    $fetchRow = $queryResult->fetch_assoc();
    if (!empty($fetchRow) && isset($fetchRow['form_data']) && !empty($fetchRow['form_data'])) {
        $existRecord = json_decode($fetchRow['form_data'], true);
    }
}
$sql = "SELECT form_data FROM health_care LIMIT 1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);


// echo '<pre>';
// print_r($existRecord);
// echo '</pre>';
// exit;




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pupil's Confidential Health Information</title>
    <link rel="stylesheet" href="mystyle.css">

</head>

<body>

    <div class="container">
        <h2 style="text-align: center;">Pupil's Confidential Health Information</h2>
        <p>To assist our <strong>Health Centre</strong> Staff we ask that all sections are completed to the best of your
            knowledge, and signed electronically by the parent or guardian.</p>

        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<!-- ID of the existing record -->">

            <div class="form-group">
                <label for="previousSchool">Previous School <span class="required">* Required field</span></label>
                <input type="text" id="previousSchool" name="previousSchool" placeholder="Name of Previous School"
                    value="<?= (isset($existRecord['previousSchool']) && !empty($existRecord['previousSchool'])) ? $existRecord['previousSchool'] : '' ?>"
                    required>
            </div>


            <div class="row">
                <div class="column-left">
                    <div class="form-group">
                        <label for="familyDoctor">Name of Family Doctor or GP <span class="required">* Required
                                field</span></label>
                        <input type="text" id="familyDoctor" name="familyDoctor"
                            value="<?= (isset($existRecord['familyDoctor']) && !empty($existRecord['familyDoctor'])) ? $existRecord['familyDoctor'] : '' ?>"
                            placeholder="Name of Family Doctor or GP" required>
                    </div>

                    <div class="form-group">
                        <label for="gpAddress">Address of GP <span class="required">* Required field</span></label>
                        <textarea id="gpAddress" name="gpAddress" placeholder="Address of GP" required>
                            <?= (isset($existRecord['gpAddress']) && !empty($existRecord['gpAddress'])) ? $existRecord['gpAddress'] : '' ?>
                        </textarea>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="column-right">
                    <div class="form-group">
                        <label for="gpPhone">Telephone No of GP <span class="required">* Required field</span></label>
                        <input type="tel" id="gpPhone" name="gpPhone" placeholder="Telephone No of GP"
                            value="<?= (isset($existRecord['gpPhone']) && !empty($existRecord['gpPhone'])) ? $existRecord['gpPhone'] : '' ?>"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="ihsNumber">IHS reference number (International Students ONLY)</label>
                        <input type="text" id="ihsNumber" name="ihsNumber" placeholder="IHS reference number"
                            value="<?= (isset($existRecord['ihsNumber']) && !empty($existRecord['ihsNumber'])) ? $existRecord['ihsNumber'] : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="nhsNumber">NHS Number (if known):</label>
                        <input type="text" id="nhsNumber" name="nhsNumber" placeholder="NHS Number (UK Resident Only)"
                            value="<?= (isset($existRecord['nhsNumber']) && !empty($existRecord['nhsNumber'])) ? $existRecord['nhsNumber'] : '' ?>">
                    </div>
                </div>

            </div>

            <!-- Health Conditions -->
            <div class="form-group">
                <label>Has your child suffered/required treatment for any of the following?</label>
                <p>Please give details as required, including dates, medications etc.</p>

                <label>Attention Deficit Hyperactivity Disorder (ADHD) <span class="required">* Required
                        field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['ADHD']) && $existRecord['ADHD'] == 'yes') ? 'checked' : '' ?>
                            type="radio" name="ADHD" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['ADHD']) && $existRecord['ADHD'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="ADHD" value="no" required> No</label>
                </div>
                <div class="row1" id="ADHD-div" <?= (isset($existRecord['ADHD']) && $existRecord['ADHD'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">
                            Diagnosis Month / Year:
                            <span class="required">* Required field</span>
                        </label>
                        <input type="month" placeholder="Month / Year" class="input" name="ADHD-diagnosis"
                            value="<?= (isset($existRecord['ADHD_diagnosis']) && !empty($existRecord['ADHD_diagnosis'])) ? $existRecord['ADHD_diagnosis'] : '' ?>">


                    </div>

                    <div class="col-2">
                        <label class="label">
                            Trigger / Symptoms / Current Treatments
                            <span class="required">* Required field</span>
                        </label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="ADHD-trig"><?= (isset($existRecord['ADHD_trig']) && !empty($existRecord['ADHD_trig'])) ? $existRecord['ADHD_trig'] : '' ?></textarea>
                    </div>

                    <div class="col-1">
                        <label class="label">
                            OnGoing?
                            <span class="required">* Required field</span>
                        </label>
                        <label class="radio-label">
                            <input <?= (isset($existRecord['ADHD_ongoing']) && $existRecord['ADHD_ongoing'] == 'yes') ? 'checked' : '' ?> type="radio" name="ADHD-ongoing" value="yes"> Yes
                        </label>
                        <label class="radio-label">
                            <input <?= (isset($existRecord['ADHD_ongoing']) && $existRecord['ADHD_ongoing'] == 'no') ? 'checked' : '' ?> type="radio" name="ADHD-ongoing" value="no"> No
                        </label>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label>Autism Spectrum <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['autism']) && $existRecord['autism'] == 'yes') ? 'checked' : '' ?> type="radio" name="autism" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['autism']) && $existRecord['autism'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="autism" value="no" required> No</label>
                </div>
                <div class="row1" id="autism-div" <?= (isset($existRecord['autism']) && $existRecord['autism'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">
                            Diagnosis Month / Year:
                            <span class="required">* Required field</span>
                        </label>
                        <input type="month" placeholder="Month / Year" class="input" name="autism-diagnosis"
                            value="<?= (isset($existRecord['autism_diagnosis']) && !empty($existRecord['autism_diagnosis'])) ? $existRecord['autism_diagnosis'] : '' ?>">
                    </div>

                    <div class="col-2">
                        <label class="label">
                            Trigger / Symptoms / Current Treatments
                            <span class="required">* Required field</span>
                        </label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="autism-trig"><?= (isset($existRecord['autism_trig']) && !empty($existRecord['autism_trig'])) ? $existRecord['autism_trig'] : '' ?></textarea>
                    </div>

                    <div class="col-1">
                        <label class="label">
                            OnGoing?
                            <span class="required">* Required field</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="autism-ongoing" value="yes"
                                <?= (isset($existRecord['autism_ongoing']) && $existRecord['autism_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="autism-ongoing" value="no"
                                <?= (isset($existRecord['autism_ongoing']) && $existRecord['autism_ongoing'] == 'no') ? 'checked' : '' ?>> No
                        </label>
                    </div>
                </div>

            </div>
            <!-- Allergy -->
            <div class="form-group">
                <label>Allergy e.g. food, medication, etc <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['allergy']) && $existRecord['allergy'] == 'yes') ? 'checked' : '' ?> type="radio" name="allergy" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['allergy']) && $existRecord['allergy'] == 'no') ? 'checked' : '' ?> type="radio" name="allergy" value="no" required> No</label>
                </div>
                <div class="row1" id="allergy-div" <?= (isset($existRecord['allergy']) && $existRecord['allergy'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">
                            Diagnosis Month / Year:
                            <span class="required">* Required field</span>
                        </label>
                        <input type="month" placeholder="Month / Year" class="input" name="allergy-diagnosis"
                            value="<?= (isset($existRecord['allergy_diagnosis']) && !empty($existRecord['allergy_diagnosis'])) ? $existRecord['allergy_diagnosis'] : '' ?>">
                    </div>

                    <div class="col-2">
                        <label class="label">
                            Trigger / Symptoms / Current Treatments
                            <span class="required">* Required field</span>
                        </label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="allergy-trig"><?= (isset($existRecord['allergy_trig']) && !empty($existRecord['allergy_trig'])) ? $existRecord['allergy_trig'] : '' ?></textarea>
                    </div>

                    <div class="col-1">
                        <label class="label">
                            OnGoing?
                            <span class="required">* Required field</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="allergy-ongoing" value="yes"
                                <?= (isset($existRecord['allergy_ongoing']) && $existRecord['allergy_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="allergy-ongoing" value="no"
                                <?= (isset($existRecord['allergy_ongoing']) && $existRecord['allergy_ongoing'] == 'no') ? 'checked' : '' ?>> No
                        </label>
                    </div>
                </div>
            </div>

            <!-- Asthma -->
            <div class="form-group">
                <label>Asthma <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['asthma']) && $existRecord['asthma'] == 'yes') ? 'checked' : '' ?> type="radio" name="asthma" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['asthma']) && $existRecord['asthma'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="asthma" value="no" required> No</label>
                </div>
                <div class="row1" id="asthma-div" <?= (isset($existRecord['asthma']) && $existRecord['asthma'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">
                            Diagnosis Month / Year:
                            <span class="required">* Required field</span>
                        </label>
                        <input type="month" placeholder="Month / Year" class="input" name="asthma-diagnosis"
                            value="<?= (isset($existRecord['asthma_diagnosis']) && !empty($existRecord['asthma_diagnosis'])) ? $existRecord['asthma_diagnosis'] : '' ?>">
                    </div>

                    <div class="col-2">
                        <label class="label">
                            Trigger / Symptoms / Current Treatments
                            <span class="required">* Required field</span>
                        </label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="asthma-trig"><?= (isset($existRecord['asthma_trig']) && !empty($existRecord['asthma_trig'])) ? $existRecord['asthma_trig'] : '' ?></textarea>
                    </div>

                    <div class="col-1">
                        <label class="label">
                            OnGoing?
                            <span class="required">* Required field</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="asthma-ongoing" value="yes"
                                <?= (isset($existRecord['asthma_ongoing']) && $existRecord['asthma_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="asthma-ongoing" value="no"
                                <?= (isset($existRecord['asthma_ongoing']) && $existRecord['asthma_ongoing'] == 'no') ? 'checked' : '' ?>> No
                        </label>
                    </div>
                </div>
            </div>

            <!-- Bed Wetting / Soiling -->
            <div class="form-group">
                <label>Bed Wetting / Soiling <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['bed']) && $existRecord['bed'] == 'yes') ? 'checked' : '' ?>
                            type="radio" name="bed" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['bed']) && $existRecord['bed'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="bed" value="no" required> No</label>
                </div>
                <div class="row1" id="bed-div" <?= (isset($existRecord['bed']) && $existRecord['bed'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">
                            Diagnosis Month / Year:
                            <span class="required">* Required field</span>
                        </label>
                        <input type="month" placeholder="Month / Year" class="input" name="bed-diagnosis"
                            value="<?= (isset($existRecord['bed_diagnosis']) && !empty($existRecord['bed_diagnosis'])) ? $existRecord['bed_diagnosis'] : '' ?>">
                    </div>

                    <div class="col-2">
                        <label class="label">
                            Trigger / Symptoms / Current Treatments
                            <span class="required">* Required field</span>
                        </label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="bed-trig"><?= (isset($existRecord['bed_trig']) && !empty($existRecord['bed_trig'])) ? $existRecord['bed_trig'] : '' ?></textarea>
                    </div>

                    <div class="col-1">
                        <label class="label">
                            OnGoing?
                            <span class="required">* Required field</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="bed-ongoing" value="yes" <?= (isset($existRecord['bed_ongoing']) && $existRecord['bed_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="bed-ongoing" value="no" <?= (isset($existRecord['bed_ongoing']) && $existRecord['bed_ongoing'] == 'no') ? 'checked' : '' ?>> No
                        </label>
                    </div>
                </div>
            </div>

            <!-- Chicken Pox -->
            <div class="form-group">
                <label>Chicken Pox <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['pox']) && $existRecord['pox'] == 'yes') ? 'checked' : '' ?>
                            type="radio" name="pox" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['pox']) && $existRecord['pox'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="pox" value="no" required> No</label>
                </div>
                <div class="row1" id="pox-div" <?= (isset($existRecord['pox']) && $existRecord['pox'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">
                            Diagnosis Month / Year:
                            <span class="required">* Required field</span>
                        </label>
                        <input type="month" placeholder="Month / Year" class="input" name="pox-diagnosis"
                            value="<?= (isset($existRecord['pox_diagnosis']) && !empty($existRecord['pox_diagnosis'])) ? $existRecord['pox_diagnosis'] : '' ?>">
                    </div>

                    <div class="col-2">
                        <label class="label">
                            Trigger / Symptoms / Current Treatments
                            <span class="required">* Required field</span>
                        </label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="pox-trig"><?= (isset($existRecord['pox_trig']) && !empty($existRecord['pox_trig'])) ? $existRecord['pox_trig'] : '' ?></textarea>
                    </div>

                    <div class="col-1">
                        <label class="label">
                            OnGoing?
                            <span class="required">* Required field</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="pox-ongoing" value="yes" <?= (isset($existRecord['pox_ongoing']) && $existRecord['pox_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="pox-ongoing" value="no" <?= (isset($existRecord['pox_ongoing']) && $existRecord['pox_ongoing'] == 'no') ? 'checked' : '' ?>> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Dental Problems <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['dental']) && $existRecord['dental'] == 'yes') ? 'checked' : '' ?> type="radio" name="dental" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['dental']) && $existRecord['dental'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="dental" value="no" required> No</label>
                </div>
                <div class="row1" id="dental-div" <?= (isset($existRecord['dental']) && $existRecord['dental'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">Diagnosis Month / Year: <span class="required">* Required
                                field</span></label>
                        <input type="month" placeholder="Month / Year" class="input" name="dental-diagnosis"
                            value="<?= (isset($existRecord['dental_diagnosis']) && !empty($existRecord['dental_diagnosis'])) ? $existRecord['dental_diagnosis'] : '' ?>">
                    </div>
                    <div class="col-2">
                        <label class="label">Trigger / Symptoms / Current Treatments <span class="required">* Required
                                field</span></label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="dental-trig"><?= (isset($existRecord['dental_trig']) && !empty($existRecord['dental_trig'])) ? $existRecord['dental_trig'] : '' ?></textarea>
                    </div>
                    <div class="col-1">
                        <label class="label">OnGoing? <span class="required">* Required field</span></label>
                        <label class="radio-label">
                            <input type="radio" name="dental-ongoing" value="yes"
                                <?= (isset($existRecord['dental_ongoing']) && $existRecord['dental_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="dental-ongoing" value="no"
                                <?= (isset($existRecord['dental_ongoing']) && $existRecord['dental_ongoing'] == 'no') ? 'checked' : '' ?>> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Diabetes <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['diabetes']) && $existRecord['diabetes'] == 'yes') ? 'checked' : '' ?> type="radio" name="diabetes" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['diabetes']) && $existRecord['diabetes'] == 'no') ? 'checked' : '' ?> type="radio" name="diabetes" value="no" required> No</label>
                </div>
                <div class="row1" id="diabetes-div" <?= (isset($existRecord['diabetes']) && $existRecord['diabetes'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">Diagnosis Month / Year: <span class="required">* Required
                                field</span></label>
                        <input type="month" placeholder="Month / Year" class="input" name="diabetes-diagnosis"
                            value="<?= (isset($existRecord['diabetes_diagnosis']) && !empty($existRecord['diabetes_diagnosis'])) ? $existRecord['diabetes_diagnosis'] : '' ?>">
                    </div>
                    <div class="col-2">
                        <label class="label">Trigger / Symptoms / Current Treatments <span class="required">* Required
                                field</span></label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="diabetes-trig"><?= (isset($existRecord['diabetes_trig']) && !empty($existRecord['diabetes_trig'])) ? $existRecord['diabetes_trig'] : '' ?></textarea>
                    </div>
                    <div class="col-1">
                        <label class="label">OnGoing? <span class="required">* Required field</span></label>
                        <label class="radio-label">
                            <input type="radio" name="diabetes-ongoing" value="yes"
                                <?= (isset($existRecord['diabetes_ongoing']) && $existRecord['diabetes_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="diabetes-ongoing" value="no"
                                <?= (isset($existRecord['diabetes_ongoing']) && $existRecord['diabetes_ongoing'] == 'no') ? 'checked' : '' ?>> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Diagnosed Eating Disorder (eg. anorexia nervosa, bulimia nervosa) <span class="required">*
                        Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['eating']) && $existRecord['eating'] == 'yes') ? 'checked' : '' ?> type="radio" name="eating" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['eating']) && $existRecord['eating'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="eating" value="no" required> No</label>
                </div>
                <div class="row1" id="eating-div" <?= (isset($existRecord['eating']) && $existRecord['eating'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">Diagnosis Month / Year: <span class="required">* Required
                                field</span></label>
                        <input type="month" placeholder="Month / Year" class="input" name="eating-diagnosis"
                            value="<?= (isset($existRecord['eating_diagnosis']) && !empty($existRecord['eating_diagnosis'])) ? $existRecord['eating_diagnosis'] : '' ?>">
                    </div>
                    <div class="col-2">
                        <label class="label">Trigger / Symptoms / Current Treatments <span class="required">* Required
                                field</span></label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="eating-trig"><?= (isset($existRecord['eating_trig']) && !empty($existRecord['eating_trig'])) ? $existRecord['eating_trig'] : '' ?></textarea>
                    </div>
                    <div class="col-1">
                        <label class="label">OnGoing? <span class="required">* Required field</span></label>
                        <label class="radio-label">
                            <input type="radio" name="eating-ongoing" value="yes"
                                <?= (isset($existRecord['eating_ongoing']) && $existRecord['eating_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="eating-ongoing" value="no"
                                <?= (isset($existRecord['eating_ongoing']) && $existRecord['eating_ongoing'] == 'no') ? 'checked' : '' ?>> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Ear / Nose / Throat (ENT) <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['ear']) && $existRecord['ear'] == 'yes') ? 'checked' : '' ?>
                            type="radio" name="ear" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['ear']) && $existRecord['ear'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="ear" value="no" required> No</label>
                </div>
                <div class="row1" id="ear-div" <?= (isset($existRecord['ear']) && $existRecord['ear'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">Diagnosis Month / Year: <span class="required">* Required
                                field</span></label>
                        <input type="month" placeholder="Month / Year" class="input" name="ear-diagnosis"
                            value="<?= (isset($existRecord['ear_diagnosis']) && !empty($existRecord['ear_diagnosis'])) ? $existRecord['ear_diagnosis'] : '' ?>">
                    </div>
                    <div class="col-2">
                        <label class="label">Trigger / Symptoms / Current Treatments <span class="required">* Required
                                field</span></label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="ear-trig"><?= (isset($existRecord['ear_trig']) && !empty($existRecord['ear_trig'])) ? $existRecord['ear_trig'] : '' ?></textarea>
                    </div>
                    <div class="col-1">
                        <label class="label">OnGoing? <span class="required">* Required field</span></label>
                        <label class="radio-label">
                            <input type="radio" name="ear-ongoing" value="yes" <?= (isset($existRecord['ear_ongoing']) && $existRecord['ear_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="ear-ongoing" value="no" <?= (isset($existRecord['ear_ongoing']) && $existRecord['ear_ongoing'] == 'no') ? 'checked' : '' ?>> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Epilepsy <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['epilepsy']) && $existRecord['epilepsy'] == 'yes') ? 'checked' : '' ?> type="radio" name="epilepsy" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['epilepsy']) && $existRecord['epilepsy'] == 'no') ? 'checked' : '' ?> type="radio" name="epilepsy" value="no" required> No</label>
                </div>
                <div class="row1" id="epilepsy-div" <?= (isset($existRecord['epilepsy']) && $existRecord['epilepsy'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">Diagnosis Month / Year: <span class="required">* Required
                                field</span></label>
                        <input type="month" placeholder="Month / Year" class="input" name="epilepsy-diagnosis"
                            value="<?= (isset($existRecord['epilepsy_diagnosis']) && !empty($existRecord['epilepsy_diagnosis'])) ? $existRecord['epilepsy_diagnosis'] : '' ?>">
                    </div>
                    <div class="col-2">
                        <label class="label">Trigger / Symptoms / Current Treatments <span class="required">* Required
                                field</span></label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="epilepsy-trig"><?= (isset($existRecord['epilepsy_trig']) && !empty($existRecord['epilepsy_trig'])) ? $existRecord['epilepsy_trig'] : '' ?></textarea>
                    </div>
                    <div class="col-1">
                        <label class="label">OnGoing? <span class="required">* Required field</span></label>
                        <label class="radio-label">
                            <input type="radio" name="epilepsy-ongoing" value="yes"
                                <?= (isset($existRecord['epilepsy_ongoing']) && $existRecord['epilepsy_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="epilepsy-ongoing" value="no"
                                <?= (isset($existRecord['epilepsy_ongoing']) && $existRecord['epilepsy_ongoing'] == 'no') ? 'checked' : '' ?>> No
                        </label>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label>Hay fever <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['hay']) && $existRecord['hay'] == 'yes') ? 'checked' : '' ?>
                            type="radio" name="hay" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['hay']) && $existRecord['hay'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="hay" value="no" required> No</label>
                </div>
                <div class="row1" id="hay-div" <?= (isset($existRecord['hay']) && $existRecord['hay'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">Diagnosis Month / Year: <span class="required">* Required
                                field</span></label>
                        <input type="month" placeholder="Month / Year" class="input" name="hay-diagnosis"
                            value="<?= (isset($existRecord['hay_diagnosis']) && !empty($existRecord['hay_diagnosis'])) ? $existRecord['hay_diagnosis'] : '' ?>">
                    </div>
                    <div class="col-2">
                        <label class="label">Trigger / Symptoms / Current Treatments <span class="required">* Required
                                field</span></label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="hay-trig"><?= (isset($existRecord['hay_trig']) && !empty($existRecord['hay_trig'])) ? $existRecord['hay_trig'] : '' ?></textarea>
                    </div>
                    <div class="col-1">
                        <label class="label">OnGoing? <span class="required">* Required field</span></label>
                        <label class="radio-label"><input type="radio" name="hay-ongoing" value="yes"
                                <?= (isset($existRecord['hay_ongoing']) && $existRecord['hay_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes</label>
                        <label class="radio-label"><input type="radio" name="hay-ongoing" value="no"
                                <?= (isset($existRecord['hay_ongoing']) && $existRecord['hay_ongoing'] == 'no') ? 'checked' : '' ?>> No</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Heart Disease <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['heart']) && $existRecord['heart'] == 'yes') ? 'checked' : '' ?>
                            type="radio" name="heart" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['heart']) && $existRecord['heart'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="heart" value="no" required> No</label>
                </div>
                <div class="row1" id="heart-div" <?= (isset($existRecord['heart']) && $existRecord['heart'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">Diagnosis Month / Year: <span class="required">* Required
                                field</span></label>
                        <input type="month" placeholder="Month / Year" class="input" name="heart-diagnosis"
                            value="<?= (isset($existRecord['heart_diagnosis']) && !empty($existRecord['heart_diagnosis'])) ? $existRecord['heart_diagnosis'] : '' ?>">
                    </div>
                    <div class="col-2">
                        <label class="label">Trigger / Symptoms / Current Treatments <span class="required">* Required
                                field</span></label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="heart-trig"><?= (isset($existRecord['heart_trig']) && !empty($existRecord['heart_trig'])) ? $existRecord['heart_trig'] : '' ?></textarea>
                    </div>
                    <div class="col-1">
                        <label class="label">OnGoing? <span class="required">* Required field</span></label>
                        <label class="radio-label"><input type="radio" name="heart-ongoing" value="yes"
                                <?= (isset($existRecord['heart_ongoing']) && $existRecord['heart_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes</label>
                        <label class="radio-label"><input type="radio" name="heart-ongoing" value="no"
                                <?= (isset($existRecord['heart_ongoing']) && $existRecord['heart_ongoing'] == 'no') ? 'checked' : '' ?>> No</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Kidney Disease <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['kidney']) && $existRecord['kidney'] == 'yes') ? 'checked' : '' ?> type="radio" name="kidney" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['kidney']) && $existRecord['kidney'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="kidney" value="no" required> No</label>
                </div>
                <div class="row1" id="kidney-div" <?= (isset($existRecord['kidney']) && $existRecord['kidney'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">Diagnosis Month / Year: <span class="required">* Required
                                field</span></label>
                        <input type="month" placeholder="Month / Year" class="input" name="kidney-diagnosis"
                            value="<?= (isset($existRecord['kidney_diagnosis']) && !empty($existRecord['kidney_diagnosis'])) ? $existRecord['kidney_diagnosis'] : '' ?>">
                    </div>
                    <div class="col-2">
                        <label class="label">Trigger / Symptoms / Current Treatments <span class="required">* Required
                                field</span></label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="kidney-trig"><?= (isset($existRecord['kidney_trig']) && !empty($existRecord['kidney_trig'])) ? $existRecord['kidney_trig'] : '' ?></textarea>
                    </div>
                    <div class="col-1">
                        <label class="label">OnGoing? <span class="required">* Required field</span></label>
                        <label class="radio-label"><input type="radio" name="kidney-ongoing" value="yes"
                                <?= (isset($existRecord['kidney_ongoing']) && $existRecord['kidney_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes</label>
                        <label class="radio-label"><input type="radio" name="kidney-ongoing" value="no"
                                <?= (isset($existRecord['kidney_ongoing']) && $existRecord['kidney_ongoing'] == 'no') ? 'checked' : '' ?>> No</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Mental Health Problems <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['mental']) && $existRecord['mental'] == 'yes') ? 'checked' : '' ?> type="radio" name="mental" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['mental']) && $existRecord['mental'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="mental" value="no" required> No</label>
                </div>
                <div class="row1" id="mental-div" <?= (isset($existRecord['mental']) && $existRecord['mental'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">Diagnosis Month / Year: <span class="required">* Required
                                field</span></label>
                        <input type="month" placeholder="Month / Year" class="input" name="mental-diagnosis"
                            value="<?= (isset($existRecord['mental_diagnosis']) && !empty($existRecord['mental_diagnosis'])) ? $existRecord['mental_diagnosis'] : '' ?>">
                    </div>
                    <div class="col-2">
                        <label class="label">Trigger / Symptoms / Current Treatments <span class="required">* Required
                                field</span></label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="mental-trig"><?= (isset($existRecord['mental_trig']) && !empty($existRecord['mental_trig'])) ? $existRecord['mental_trig'] : '' ?></textarea>
                    </div>
                    <div class="col-1">
                        <label class="label">OnGoing? <span class="required">* Required field</span></label>
                        <label class="radio-label"><input type="radio" name="mental-ongoing" value="yes"
                                <?= (isset($existRecord['mental_ongoing']) && $existRecord['mental_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes</label>
                        <label class="radio-label"><input type="radio" name="mental-ongoing" value="no"
                                <?= (isset($existRecord['mental_ongoing']) && $existRecord['mental_ongoing'] == 'no') ? 'checked' : '' ?>> No</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Poor Relationship with Food <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['poor']) && $existRecord['poor'] == 'yes') ? 'checked' : '' ?>
                            type="radio" name="poor" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['poor']) && $existRecord['poor'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="poor" value="no" required> No</label>
                </div>
                <div class="row1" id="poor-div" <?= (isset($existRecord['poor']) && $existRecord['poor'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-1">
                        <label class="label">Diagnosis Month / Year: <span class="required">* Required
                                field</span></label>
                        <input type="month" placeholder="Month / Year" class="input" name="poor-diagnosis"
                            value="<?= (isset($existRecord['poor_diagnosis']) && !empty($existRecord['poor_diagnosis'])) ? $existRecord['poor_diagnosis'] : '' ?>">
                    </div>
                    <div class="col-2">
                        <label class="label">Trigger / Symptoms / Current Treatments <span class="required">* Required
                                field</span></label>
                        <textarea placeholder="Details / Treatments" class="textarea"
                            name="poor-trig"><?= (isset($existRecord['poor_trig']) && !empty($existRecord['poor_trig'])) ? $existRecord['poor_trig'] : '' ?></textarea>
                    </div>
                    <div class="col-1">
                        <label class="label">OnGoing? <span class="required">* Required field</span></label>
                        <label class="radio-label"><input type="radio" name="poor-ongoing" value="yes"
                                <?= (isset($existRecord['poor_ongoing']) && $existRecord['poor_ongoing'] == 'yes') ? 'checked' : '' ?>> Yes</label>
                        <label class="radio-label"><input type="radio" name="poor-ongoing" value="no"
                                <?= (isset($existRecord['poor_ongoing']) && $existRecord['poor_ongoing'] == 'no') ? 'checked' : '' ?>> No</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Has your child had any other significant conditions that would affect his/her well-being that the
                    School should be aware of? (Please list any major illnesses, hospitalisation, pre-existing medical
                    conditions) <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['aware']) && $existRecord['aware'] == 'yes') ? 'checked' : '' ?>
                            type="radio" name="aware" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['aware']) && $existRecord['aware'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="aware" value="no" required> No</label>
                </div>
                <div id="aware-div" <?= (isset($existRecord['aware']) && $existRecord['aware'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <div class="col-2">
                        <label class="label">
                            Please Details
                            <span class="required">* Required field</span>
                        </label>
                        <textarea placeholder="Please Specify details" class="textarea"
                            name="aware-text"><?= (isset($existRecord['aware_text']) && !empty($existRecord['aware_text'])) ? $existRecord['aware_text'] : '' ?></textarea>
                    </div>

                </div>

            </div>
            <div class="form-group">
                <label>Is he/she fit, in all respects, for ordinary School life, ie games, sports, running, swimming?
                    <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['fit']) && $existRecord['fit'] == 'yes') ? 'checked' : '' ?>
                            type="radio" name="fit" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['fit']) && $existRecord['fit'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="fit" value="no" required> No</label>
                </div>
                <div id="fit-div" <?= (isset($existRecord['fit']) && $existRecord['fit'] == 'no') ? '' : 'style="display: none;"' ?>>
                    <div class="col-2">
                        <label class="label">
                            Please Details
                            <span class="required">* Required field</span>
                        </label>
                        <textarea placeholder="Please Specify details" class="textarea"
                            name="fit-text"><?= (isset($existRecord['fit_text']) && !empty($existRecord['fit_text'])) ? $existRecord['fit_text'] : '' ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label style="font-size: 30px; text-align: left;"> Routine Medication</label>
                </div>
                <br />
                <label>Does your child carry an EpiPen?
                    <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['epi']) && $existRecord['epi'] == 'yes') ? 'checked' : '' ?>
                            type="radio" name="epi" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['epi']) && $existRecord['epi'] == 'no') ? 'checked' : '' ?>
                            type="radio" name="epi" value="no" required> No</label>
                </div>
                <div id="epi-div" <?= (isset($existRecord['fit']) && $existRecord['fit'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <label style="font-weight : bold">If yes, three EpiPens should be brought in on the first day of
                        school. (Two for your child and one for school)</label>
                </div>
            </div>
            <div class="form-group">
                <label> Does your child take routine medication?
                    <span class="required">* Required field</span></label>
                <div class="radio-group">
                    <label><input <?= (isset($existRecord['epi_med']) && $existRecord['epi_med'] == 'yes') ? 'checked' : '' ?> type="radio" name="epi-med" value="yes" required> Yes</label>
                    <label><input <?= (isset($existRecord['epi_med']) && $existRecord['epi_med'] == 'no') ? 'checked' : '' ?> type="radio" name="epi-med" value="no" required> No</label>
                </div>

                <div class="medication-section" id="epi-med-div" <?= (isset($existRecord['epi_med']) && $existRecord['epi_med'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <label class="medication-title">
                        Please give details of any medication your child routinely takes.
                    </label>

                    <table class="medication-table">
                        <thead>
                            <tr class="medication-header-row">
                                <th class="medication-header">Medication Name</th>
                                <th class="medication-header">Dosage</th>
                                <th class="medication-header">Reason for taking</th>
                                <th class="medication-header">Review Date</th>
                            </tr>
                        </thead>
                        <tbody id="medication-body">
                            <tr class="medication-row">
                                <td class="medication-cell">
                                    <input type="text" placeholder="Medication Name" class="medication-input"
                                        name="med-name"
                                        value="<?= (isset($existRecord['epi_med_name']) && !empty($existRecord['epi_med_name'])) ? $existRecord['epi_med_name'] : '' ?>" />
                                </td>
                                <td class="medication-cell">
                                    <input type="text" placeholder="Dosage" class="medication-input" name="dosage"
                                        value="<?= (isset($existRecord['epi_med_dosage']) && !empty($existRecord['epi_med_dosage'])) ? $existRecord['epi_med_dosage'] : '' ?>" />
                                </td>
                                <td class="medication-cell">
                                    <input type="text" placeholder="Reason for taking" class="medication-input"
                                        name="reason"
                                        value="<?= (isset($existRecord['epi_med_reason']) && !empty($existRecord['epi_med_reason'])) ? $existRecord['epi_med_reason'] : '' ?>" />
                                </td>
                                <td class="medication-cell">
                                    <input type="date" class="medication-input" name="review-date"
                                        value="<?= (isset($existRecord['epi_med_review_date']) && !empty($existRecord['epi_med_review_date'])) ? $existRecord['epi_med_review_date'] : '' ?>" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="medication-note">
                        The School Medical Team strongly recommends all pupils to be vaccinated in accordance with the
                        UK routine childhood immunisation programme
                        <a href="http://www.nhs.uk" class="medication-link">http://www.nhs.uk</a>
                        and the
                        <strong class="medication-highlight">World Health Organisation</strong>.
                    </p>
                </div>
                <div class="form-group">
                    <div>
                        <label style="font-size: 30px; text-align: left;">Vaccination certificate/s</label>
                    </div>
                    <br />
                    <label>Please submit a full vaccination history with certificates; if your child has not received
                        any vaccination please select No
                        <span class="required">* Required field</span></label>
                    <div class="radio-group">
                        <label><input <?= (isset($existRecord['vaccination']) && $existRecord['vaccination'] == 'yes') ? 'checked' : '' ?> type="radio" name="vaccination" value="yes" required> Yes</label>
                        <label><input <?= (isset($existRecord['vaccination']) && $existRecord['vaccination'] == 'no') ? 'checked' : '' ?> type="radio" name="vaccination" value="no" required> No</label>
                    </div>
                    <div class="upload-section" id="vaccination-file-div" <?= (isset($existRecord['vaccination']) && $existRecord['vaccination'] == 'yes') ? '' : 'style="display: none;"' ?>>
                        <label>Please upload a copy of your Son or Daughter's Vaccination Certificate/s.</label>
                        <input type="file" id="file-upload" name="uploaded_file"
                            accept=".jpg, .jpeg, .doc, .docx, .pdf">
                        <?php
                        if ($data) {
                            $formData = json_decode($data['form_data'], true);
                            if (!empty($formData['uploaded_file'])) {
                                echo "<p>Uploaded File: <a href='{$formData['uploaded_file']}' target='_blank'>View File</a></p>";
                                echo "<input type='hidden' id='existingFile' value='1'>";
                            }
                        }
                        ?>

                        <p>Upload file size limit 10 MB</p>
                        <p>Allowed file types: JPG, JPEG, DOC, DOCX, PDF</p>
                        <button class="upload-btn">Upload image</button>
                    </div>
                    <div id="vaccination-text-div" <?= (isset($existRecord['vaccination']) && $existRecord['vaccination'] == 'no') ? '' : 'style="display: none;"' ?>>
                        <div class="col-2">
                            <label class="label">Please briefly explain why the certificate is not available. Our Health
                                Centre Staff may then contact you to discuss further
                                <span class="required">* Required field</span>
                            </label>
                            <textarea placeholder="Please Specify details" class="textarea"
                                name="vaccination-text"><?= (isset($existRecord['vaccination_text']) && !empty($existRecord['vaccination_text'])) ? $existRecord['vaccination_text'] : '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label style="font-size: 30px; text-align: left;">Dietary Information</label>
                    </div>
                    <br />
                    <label>Allergy or food intolerance
                        <span class="required">* Required field</span></label>
                    <div class="radio-group">
                        <label><input <?= (isset($existRecord['intolerance']) && $existRecord['intolerance'] == 'yes') ? 'checked' : '' ?> type="radio" name="intolerance" value="yes" required> Yes</label>
                        <label><input <?= (isset($existRecord['intolerance']) && $existRecord['intolerance'] == 'no') ? 'checked' : '' ?> type="radio" name="intolerance" value="no" required> No</label>
                    </div>
                    <div class="col-2" id="intolerance-div" <?= (isset($existRecord['intolerance']) && $existRecord['intolerance'] == 'yes') ? '' : 'style="display: none;"' ?>>
                        <label class="label">Please provide details
                            <span class="required">* Required field</span>
                        </label>
                        <textarea placeholder="Please provide details" class="textarea"
                            name="intolerance-text"><?= (isset($existRecord['intolerance_text']) && !empty($existRecord['intolerance_text'])) ? $existRecord['intolerance_text'] : '' ?></textarea>
                    </div>
                </div>
               <div class="form-group">
    <label>
        Food restrictions due to religion
        <span class="required">* Required field</span>
    </label>
    <div class="radio-group">
        <label>
            <input <?= (isset($existRecord['restrictions']) && $existRecord['restrictions'] == 'yes') ? 'checked' : '' ?>  
                type="radio" name="restrictions" value="yes" required> Yes
        </label>
        <label>
            <input <?= (isset($existRecord['restrictions']) && $existRecord['restrictions'] == 'no') ? 'checked' : '' ?>  
                type="radio" name="restrictions" value="no" required> No
        </label>
    </div>
</div>

<div class="form-group">
    <label>
        I consent to my child receiving first aid treatment as necessary.
        <span class="required">* Required field</span>
    </label>
    <div class="radio-group">
        <label>
            <input <?= (isset($existRecord['first_aid']) && $existRecord['first_aid'] == 'yes') ? 'checked' : '' ?>  
                type="radio" name="first-aid" value="yes" required> Yes
        </label>
        <label>
            <input <?= (isset($existRecord['first_aid']) && $existRecord['first_aid'] == 'no') ? 'checked' : '' ?>  
                type="radio" name="first-aid" value="no" required> No
        </label>
    </div>
</div>

<div class="form-group">
    <label>
        Boarders Only - I agree for my child to be given prescribed medications if advised by the School Doctor
        <span class="required">* Required field</span>
    </label>
    <div class="radio-group">
        <label>
            <input <?= (isset($existRecord['prescribed_medications']) && $existRecord['prescribed_medications'] == 'yes') ? 'checked' : '' ?>  
                type="radio" name="prescribed-medications" value="yes" required> Yes
        </label>
        <label>
            <input <?= (isset($existRecord['prescribed_medications']) && $existRecord['prescribed_medications'] == 'no') ? 'checked' : '' ?>  
                type="radio" name="prescribed-medications" value="no" required> No
        </label>
    </div>
</div>

<div class="form-group">
    <label>
        Day & Boarding Students - I agree for my child to be given over the counter non-prescription medication (eg calpol, paracetamol etc) should they require it, in line with the School's Medical Policy.
        <span class="required">* Required field</span>
    </label>
    <div class="radio-group">
        <label>
            <input <?= (isset($existRecord['otc_medications']) && $existRecord['otc_medications'] == 'yes') ? 'checked' : '' ?>  
                type="radio" name="otc-medications" value="yes" required> Yes
        </label>
        <label>
            <input <?= (isset($existRecord['otc_medications']) && $existRecord['otc_medications'] == 'no') ? 'checked' : '' ?>  
                type="radio" name="otc-medications" value="no" required> No
        </label>
    </div>
</div>

<div class="form-group">
    <label>
        I agree to share all relevant information relating to the physical health and mental wellbeing of my child to ensure that he/she receives the best possible healthcare whilst at School
        <span class="required">* Required field</span>
    </label>
    <div class="radio-group">
        <label>
            <input <?= (isset($existRecord['health_wellbeing_info']) && $existRecord['health_wellbeing_info'] == 'yes') ? 'checked' : '' ?>  
                type="radio" name="health-wellbeing-info" value="yes" required> Yes
        </label>
        <label>
            <input <?= (isset($existRecord['health_wellbeing_info']) && $existRecord['health_wellbeing_info'] == 'no') ? 'checked' : '' ?>  
                type="radio" name="health-wellbeing-info" value="no" required> No
        </label>
    </div>
</div>

<div class="form-group">
    <label>
        I confirm that I have given the School all information relating specifically to the mental health and medical needs of my child that I wish to pass on to those responsible for his/her care and welfare.
        <span class="required">* Required field</span>
    </label>
    <div class="radio-group">
        <label>
            <input <?= (isset($existRecord['mental_health_info']) && $existRecord['mental_health_info'] == 'yes') ? 'checked' : '' ?>  
                type="radio" name="mental-health-info" value="yes" required> Yes
        </label>
        <label>
            <input <?= (isset($existRecord['mental_health_info']) && $existRecord['mental_health_info'] == 'no') ? 'checked' : '' ?>  
                type="radio" name="mental-health-info" value="no" required> No
        </label>
    </div>
</div>

<div class="form-group">
    <label>
        I accept responsibility for informing the School as soon as possible of any change in the medical needs of my child.
        <span class="required">* Required field</span>
    </label>
    <div class="radio-group">
        <label>
            <input <?= (isset($existRecord['medical_needs_update']) && $existRecord['medical_needs_update'] == 'yes') ? 'checked' : '' ?>  
                type="radio" name="medical-needs-update" value="yes" required> Yes
        </label>
        <label>
            <input <?= (isset($existRecord['medical_needs_update']) && $existRecord['medical_needs_update'] == 'no') ? 'checked' : '' ?>  
                type="radio" name="medical-needs-update" value="no" required> No
        </label>
    </div>
</div>

<div class="form-group">
    <label style="font-weight: normal;">
        All boarders are required by the School to be registered with the School Doctor, rather than the family GP and are entitled to all care and services offered by the NHS/local GP surgery. Each boarding House is run by a resident Houseparent (who acts in loco parentis), supported by a team including an Assistant Houseparent, Housemother and Tutors.
    </label>
</div>

<div class="form-group">
    <label style="text-align: left; font-weight: bold;">
        Information divulged on this form will remain confidential to Clinic staff and those with direct responsibility for the welfare of the named pupil both on and off site.
    </label>
</div>

<div class="form-group">
    <label style="text-align: left; font-weight: bold;">
        The School adhere to all NHS guidelines, including <span style="color: brown;">Gillick Competency.</span>
    </label>
    <br />
    <label>
        I agree to the above
        <span class="required">* Required field</span>
    </label>
    <div class="radio-group">
        <label>
            <input <?= (isset($existRecord['sign']) && $existRecord['sign'] == 'yes') ? 'checked' : '' ?>type="radio" name="sign" value="yes" required> Yes</label>
        <label>
            <input <?= (isset($existRecord['sign']) && $existRecord['sign'] == 'no') ? 'checked' : '' ?> type="radio" name="sign" value="no" required> No
        </label>
    </div>
    <div class="col-2" id="sign-div" <?= (isset($existRecord['sign']) && $existRecord['sign'] == 'yes') ? '' : 'style="display: none;"' ?>>
        <label class="label">Signature of Parent/Legal Guardian (Please type full name here):<span class="required">* Required field</span></label>
        <input value="<?= (isset($existRecord['sign_text']) && !empty($existRecord['sign_text'])) ? $existRecord['sign_text'] : '' ?>" type="text" placeholder="Signature of Parent/Legal Guardian" name="sign-text">
    </div>
</div>

            <button type="submit" class="submit-btn">Submit</button>
    </div>

    </form>
    </div>
    <script src="script.js"></script>
    <script>
              const form = document.getElementById('uploadForm');
              const fileInput = document.getElementById('file-upload');
              const errorMessage = document.getElementById('errorMessage');

              const existingFile = document.getElementById('existingFile');

             form.addEventListener('submit', function (event) {
             event.preventDefault();

                const file = fileInput.files[0];
                if (!file && !existingFile) {
                    errorMessage.textContent = "Please select a file.";
                    errorMessage.style.display = "block";
                    return;
                }
                if (file) {
                    if (file.size > 10 * 1024 * 1024) {
                        errorMessage.textContent = "File size should not exceed 10 MB.";
                        errorMessage.style.display = "block";
                        return;
                    }

                    const allowedTypes = [
                        "image/jpeg",
                        "application/msword",
                        "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                        "application/pdf"
                    ];

                    if (!allowedTypes.includes(file.type)) {
                        errorMessage.textContent = "Allowed file types are JPG, JPEG, DOC, DOCX, PDF.";
                        errorMessage.style.display = "block";
                        return;
                    }
                }

                errorMessage.style.display = "none";
                form.submit();
            });

    </script>

</body>

</html>