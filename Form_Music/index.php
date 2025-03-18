<?php
include 'cre_tab.php';
$sql_check = "SELECT * FROM music_demo  limit 1";
$queryResult = mysqli_query($conn, $sql_check);
$existRecord = '';
if (mysqli_num_rows($queryResult) > 0) {
    $fetchRow = $queryResult->fetch_assoc();
    if (!empty($fetchRow) && isset($fetchRow['form_data']) && !empty($fetchRow['form_data'])) {
        $existRecord = json_decode($fetchRow['form_data'], true);
    }
}
$InstrumentSelected = isset($existRecord['instrument1']) && !empty($existRecord['instrument1']);
$InstrumentSelected2 = isset($existRecord['instrument2']) && !empty($existRecord['instrument2']);

/*$sql = "SELECT form_data FROM health_care LIMIT 1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Music Lessons Form</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container">
        <h2>Music Lessons Consent Form</h2>

        <form id="uploadForm" action="insert_up.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<!-- ID of the existing record -->">

            <label for="music-lessons" class="section-title">
                Do you wish your child to have individual music lessons at additional cost? <span
                    class="required">*</span>
            </label>


            <div class="radio-group">
                <label><input <?= (isset($existRecord['music_lessons']) && $existRecord['music_lessons'] == 'yes') ? 'checked' : '' ?> type="radio" name="music_lessons" value="yes"> Yes</label>
                <label><input <?= (isset($existRecord['music_lessons']) && $existRecord['music_lessons'] == 'no') ? 'checked' : '' ?> type="radio" name="music_lessons" value="no"> No</label>
            </div>
            <p>
                We would encourage all students interested in the Music to contact our
                <a href="#">Director of Music Mr James McKelvey</a> to enquire about the opportunities on offer.
                Our Performing Arts Calendar can be viewed on the <a href="#">School Website</a>.
            </p>

            <p>
                Cost of a 40 minute lesson is £37.00 and is subject to the
                <a href="#">Parent Contract (Terms and Conditions)</a>.
            </p>

            <p>
                Instrumental timetables will be issued after the start of term in September,
                they are published weekly and are made available to parents by email.
            </p>
            <div id="Select-div" <?= (isset($existRecord['music_lessons']) && $existRecord['music_lessons'] == 'yes') ? '' : 'style="display: none;"' ?>>
                <p>
                    Tuition to be <strong>Started in September</strong>.
                </p>
                <label for="instrument1">Instrument 1: <span class="required">* Required field</span></label>
                <div class="select-wrapper">
                    <select id="instrument1" name="instrument1">
                        <option value="">Please select musical instrument</option>
                        <optgroup label="Instruments">
                            <option value="bassoon" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'bassoon') ? 'selected' : '' ?>>Bassoon</option>
                            <option value="cello" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'cello') ? 'selected' : '' ?>>Cello</option>
                            <option value="clarinet" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'clarinet') ? 'selected' : '' ?>>Clarinet</option>
                            <option value="composition" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'composition') ? 'selected' : '' ?>>Composition</option>
                            <option value="double_bass" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'double_bass') ? 'selected' : '' ?>>Double bass</option>
                            <option value="drum_kit" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'drum_kit') ? 'selected' : '' ?>>Drum kit</option>
                            <option value="euphonium" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'euphonium') ? 'selected' : '' ?>>Euphonium</option>
                            <option value="flute" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'flute') ? 'selected' : '' ?>>Flute</option>
                            <option value="french_horn" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'french_horn') ? 'selected' : '' ?>>French horn</option>
                            <option value="guitar_acoustic" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'guitar_acoustic') ? 'selected' : '' ?>>Guitar-Acoustic
                            </option>
                            <option value="guitar_bass" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'guitar_bass') ? 'selected' : '' ?>>Guitar-Bass</option>
                            <option value="guitar_classical" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'guitar_classical') ? 'selected' : '' ?>>Guitar-Classical
                            </option>
                            <option value="guitar_electric" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'guitar_electric') ? 'selected' : '' ?>>Guitar-Electric
                            </option>
                            <option value="harp" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'harp') ? 'selected' : '' ?>>Harp</option>
                            <option value="jazz_piano" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'jazz_piano') ? 'selected' : '' ?>>Jazz piano</option>
                            <option value="keyboard" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'keyboard') ? 'selected' : '' ?>>Keyboard</option>
                            <option value="oboe" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'oboe') ? 'selected' : '' ?>>Oboe</option>
                            <option value="orchestral_percussion" <?= (isset($existRecord['instrument1']) && $existRecord['instrument1'] == 'orchestral_percussion') ? 'selected' : '' ?>>Orchestral
                                percussion</option>

                        </optgroup>

                    </select>
                </div>
                <div id="input-Div1" <?= $InstrumentSelected ? '' : 'style="display:none;"' ?>>
                    <p>How long has your child been learning and what is the most recent grade achieved?</p>
                    <label for="standardReached">Standard reached: <span class="required">* Required
                            field</span></label>
                    <div class="select-wrapper">
                        <select id="standardReached" name="standardReached">
                            <option value="">Select standard</option>
                            <option value="dont-know" <?= (isset($existRecord['standardReached']) && $existRecord['standardReached'] === 'dont-know') ? 'selected' : '' ?>>Don't know</option>
                            <option value="beginner" <?= (isset($existRecord['standardReached']) && $existRecord['standardReached'] === 'beginner') ? 'selected' : '' ?>>Beginner</option>
                            <option value="grade1" <?= (isset($existRecord['standardReached']) && $existRecord['standardReached'] === 'grade1') ? 'selected' : '' ?>>Grade 1</option>
                            <option value="grade2" <?= (isset($existRecord['standardReached']) && $existRecord['standardReached'] === 'grade2') ? 'selected' : '' ?>>Grade 2</option>
                            <option value="grade3" <?= (isset($existRecord['standardReached']) && $existRecord['standardReached'] === 'grade3') ? 'selected' : '' ?>>Grade 3</option>
                            <option value="grade4" <?= (isset($existRecord['standardReached']) && $existRecord['standardReached'] === 'grade4') ? 'selected' : '' ?>>Grade 4</option>
                        </select>
                    </div>
                    <label for="yearsLearning">No. of years learning:</label>
                    <div class="input-container">
                        <span class="icon">✏️</span>
                        <input type="text" id="yearsLearning" name="yearsLearning" placeholder="No. of years learning"
                            value="<?= isset($existRecord['yearsLearning']) ? htmlspecialchars($existRecord['yearsLearning']) : '' ?>">
                    </div>


                    <label for="examBoard">Please state below Examination Board if applicable:</label>
                    <div class="input-container">
                        <textarea id="examBoard" name="examBoard" placeholder="Examination Board"
                            rows="3"><?= isset($existRecord['examBoard']) ? htmlspecialchars($existRecord['examBoard']) : '' ?></textarea>
                    </div>


                    <label>Is your child a member of an ensemble or orchestra?: <span class="required">* Required
                            field</span></label>
                    <div class="radio-group">
                        <label><input type="radio" name="ensembleMember" value="yes"
                                <?= (isset($existRecord['ensembleMember']) && $existRecord['ensembleMember'] === 'yes') ? 'checked' : '' ?>> Yes</label>
                        <label><input type="radio" name="ensembleMember" value="no"
                                <?= (isset($existRecord['ensembleMember']) && $existRecord['ensembleMember'] === 'no') ? 'checked' : '' ?>> No</label>
                    </div>

                    <div id="Hire-Div" <?= (isset($existRecord['ensembleMember']) && $existRecord['ensembleMember'] === 'yes') ? '' : 'style="display:none;"' ?>>
                        <label>Please give details:</label>
                        <div class="input-container">
                            <textarea name="hire-detail" placeholder="Member of an ensemble or orchestra details"
                                rows="3"><?= isset($existRecord['hire-detail']) ? htmlspecialchars($existRecord['hire-detail']) : '' ?></textarea>
                        </div>
                    </div>

                    <label>I would like to hire an instrument for my child to use. <span class="required">* Required
                            field</span></label>
                    <div class="radio-group">
                        <label><input type="radio" name="hireInstrument" value="yes"
                                <?= (isset($existRecord['hireInstrument']) && $existRecord['hireInstrument'] === 'yes') ? 'checked' : '' ?>> Yes</label>
                        <label><input type="radio" name="hireInstrument" value="no"
                                <?= (isset($existRecord['hireInstrument']) && $existRecord['hireInstrument'] === 'no') ? 'checked' : '' ?>> No</label>
                    </div>
                    <div id="hire-div" <?= (isset($existRecord['hireInstrument']) && $existRecord['hireInstrument'] === 'yes') ? '' : 'style="display:none;"' ?>>
                        <p>
                            <strong> Hire of a musical instrument cost is £30.25 (Per Term)</strong> and is subject to
                            availability and acceptance
                            to the Terms and Conditions of the Instrumental Hire Agreement. The Director of Music will
                            forward
                            an Instrumental Hire Agreement by return. Hire instruments are usually only available for a
                            period
                            of one year. There is no charge for use of the department pianos, organ or drum kits at
                            School.
                        </p>
                    </div>
                </div>

                <label for="instrument2">Instrument 2:</label>
                <div class="select-wrapper">
                    <select id="instrument2" name="instrument2">
                        <option value="">Please select musical instrument</option>
                        <option value="bassoon" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'bassoon') ? 'selected' : '' ?>>Bassoon</option>
                        <option value="cello" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'cello') ? 'selected' : '' ?>>Cello</option>
                        <option value="clarinet" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'clarinet') ? 'selected' : '' ?>>Clarinet</option>
                        <option value="composition" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'composition') ? 'selected' : '' ?>>Composition</option>
                        <option value="double_bass" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'double_bass') ? 'selected' : '' ?>>Double bass</option>
                        <option value="drum_kit" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'drum_kit') ? 'selected' : '' ?>>Drum kit</option>
                        <option value="euphonium" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'euphonium') ? 'selected' : '' ?>>Euphonium</option>
                        <option value="flute" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'flute') ? 'selected' : '' ?>>Flute</option>
                        <option value="french_horn" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'french_horn') ? 'selected' : '' ?>>French horn</option>
                        <option value="guitar_acoustic" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'guitar_acoustic') ? 'selected' : '' ?>>Guitar-Acoustic
                        </option>
                        <option value="guitar_bass" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'guitar_bass') ? 'selected' : '' ?>>Guitar-Bass</option>
                        <option value="guitar_classical" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'guitar_classical') ? 'selected' : '' ?>>Guitar-Classical
                        </option>
                        <option value="guitar_electric" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'guitar_electric') ? 'selected' : '' ?>>Guitar-Electric
                        </option>
                        <option value="harp" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'harp') ? 'selected' : '' ?>>Harp</option>
                        <option value="jazz_piano" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'jazz_piano') ? 'selected' : '' ?>>Jazz piano</option>
                        <option value="keyboard" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'keyboard') ? 'selected' : '' ?>>Keyboard</option>
                        <option value="oboe" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'oboe') ? 'selected' : '' ?>>Oboe</option>
                        <option value="orchestral_percussion" <?= (isset($existRecord['instrument2']) && $existRecord['instrument2'] == 'orchestral_percussion') ? 'selected' : '' ?>>Orchestral
                            percussion</option>


                        <optgroup label="Instruments">

                        </optgroup>
                    </select>
                </div>
                <div id="input-Div2" <?= $InstrumentSelected2 ? '' : 'style="display:none;"' ?>>
                    <p>How long has your child been learning and what is the most recent grade achieved?</p>

                    <label for="standardReached2">Standard reached: <span class="required">* Required
                            field</span></label>
                    <div class="select-wrapper">
                        <select id="standardReached2" name="standardReached2">
                            <option value="">Select standard</option>
                            <option value="dont-know" <?= (isset($existRecord['standardReached2']) && $existRecord['standardReached2'] === 'dont-know') ? 'selected' : '' ?>>Don't know</option>
                            <option value="beginner" <?= (isset($existRecord['standardReached2']) && $existRecord['standardReached2'] === 'beginner') ? 'selected' : '' ?>>Beginner</option>
                            <option value="grade1" <?= (isset($existRecord['standardReached2']) && $existRecord['standardReached2'] === 'grade1') ? 'selected' : '' ?>>Grade 1</option>
                            <option value="grade2" <?= (isset($existRecord['standardReached2']) && $existRecord['standardReached2'] === 'grade2') ? 'selected' : '' ?>>Grade 2</option>
                            <option value="grade3" <?= (isset($existRecord['standardReached2']) && $existRecord['standardReached2'] === 'grade3') ? 'selected' : '' ?>>Grade 3</option>
                            <option value="grade4" <?= (isset($existRecord['standardReached2']) && $existRecord['standardReached2'] === 'grade4') ? 'selected' : '' ?>>Grade 4</option>
                        </select>
                    </div>

                    <label for="yearsLearning2">No. of years learning:</label>
                    <div class="input-container">
                        <span class="icon">✏️</span>
                        <input type="text" id="yearsLearning2" name="yearsLearning2" placeholder="No. of years learning"
                            value="<?= isset($existRecord['yearsLearning2']) ? htmlspecialchars($existRecord['yearsLearning2']) : '' ?>">
                    </div>

                    <label for="examBoard2">Please state below Examination Board if applicable:</label>
                    <div class="input-container">
                        <textarea id="examBoard2" name="examBoard2" placeholder="Examination Board"
                            rows="3"><?= isset($existRecord['examBoard2']) ? htmlspecialchars($existRecord['examBoard2']) : '' ?></textarea>
                    </div>

                    <label>Is your child a member of an ensemble or orchestra?: <span class="required">* Required
                            field</span></label>
                    <div class="radio-group">
                        <label><input type="radio" name="ensembleMember2" value="yes"
                                <?= (isset($existRecord['ensembleMember2']) && $existRecord['ensembleMember2'] === 'yes') ? 'checked' : '' ?>> Yes</label>
                        <label><input type="radio" name="ensembleMember2" value="no"
                                <?= (isset($existRecord['ensembleMember2']) && $existRecord['ensembleMember2'] === 'no') ? 'checked' : '' ?>> No</label>
                    </div>

                    <div id="Hire-Div2" <?= (isset($existRecord['ensembleMember2']) && $existRecord['ensembleMember2'] === 'yes') ? '' : 'style="display:none;"' ?>>
                        <label>Please give details:</label>
                        <div class="input-container">
                            <textarea name="hire-detail2" placeholder="Member of an ensemble or orchestra details"
                                rows="3"><?= isset($existRecord['hire-detail2']) ? htmlspecialchars($existRecord['hire-detail2']) : '' ?></textarea>
                        </div>
                    </div>

                    <label>I would like to hire an instrument for my child to use. <span class="required">* Required
                            field</span></label>
                    <div class="radio-group">
                        <label><input type="radio" name="hireInstrument2" value="yes"
                                <?= (isset($existRecord['hireInstrument2']) && $existRecord['hireInstrument2'] === 'yes') ? 'checked' : '' ?>> Yes</label>
                        <label><input type="radio" name="hireInstrument2" value="no"
                                <?= (isset($existRecord['hireInstrument2']) && $existRecord['hireInstrument2'] === 'no') ? 'checked' : '' ?>> No</label>
                    </div>

                    <div id="hire-div2" <?= (isset($existRecord['hireInstrument2']) && $existRecord['hireInstrument2'] === 'yes') ? '' : 'style="display:none;"' ?>>
                        <p>
                            <strong> Hire of a musical instrument cost is £30.25 (Per Term)</strong> and is subject to
                            availability and acceptance
                            to the Terms and Conditions of the Instrumental Hire Agreement. The Director of Music will
                            forward
                            an Instrumental Hire Agreement by return. Hire instruments are usually only available for a
                            period of one year. There is no charge for use of the department pianos, organ or drum kits
                            at
                            School.
                        </p>
                    </div>
                </div>

                <div class="check-box">
                    <label>I would also like to request:</label>
                    <input type="checkbox" name="chek1" id="chek1" <?= isset($existRecord['chek1']) && $existRecord['chek1'] === 'on' ? 'checked' : '' ?>>Music Theory Group Classes
                    <br />
                    <div style="display:flex;">
                        <input type="checkbox" name="chek2" id="chek2" <?= isset($existRecord['chek2']) && $existRecord['chek2'] === 'on' ? 'checked' : '' ?>>Music Theory Individual Tuition
                    </div>
                </div>

                <div class="File-upl">
                    <label>I would like to upload copy on my child's Theory Certificate.<span class="required">*Required
                            field</span></label>
                    <div style="display:flex;">
                        <label><input <?= (isset($existRecord['certificate']) && $existRecord['certificate'] == 'yes') ? 'checked' : '' ?> type="radio" name="certificate" value="yes"> Yes</label>
                        <label><input <?= (isset($existRecord['certificate']) && $existRecord['certificate'] == 'no') ? 'checked' : '' ?> type="radio" name="certificate" value="no"> No</label>
                    </div>
                </div>
                <br />

                <div class="upload-section" id="File-Div" <?= (isset($existRecord['certificate']) && $existRecord['certificate'] === 'yes') ? '' : 'style="display:none;"' ?>>
                    <label>Please upload a copy of your child's Theory Certificate.<span class="required">*Required
                            field</span></label>
                    <br />
                    <input type="file" id="file-upload" name="uploaded_file" accept=".jpg, .jpeg, .doc, .docx, .pdf">
                    <?php
                    //if ($data) {
                        //$formData = json_decode($data['form_data'], true);
                        if (isset($existRecord['uploaded_file']) && !empty($existRecord['uploaded_file'])) {
                            echo "<p>Uploaded File: <a href='".$existRecord['uploaded_file']."' target='_blank'>View File</a></p>";
                            echo "<input type='hidden' id='existingFile' value='1'>";
                        }
                   // }
                    ?>

                    <p>Upload file size limit 2 MB</p>
                    <p>Allowed file types: JPG, JPEG, DOC, DOCX, PDF</p>
                    <!-- <button class="upload-btn">Upload image</button> -->
                </div>
            </div>

            <p class="section-title">
                <strong>Please note:</strong> A Term's Written Notice is required to discontinue Music Lessons
                or a Term's Fees for the extra tuition will be immediately payable in lieu as a debt.
            </p>

            <div class="resource-checkbox-group">
                <label>
                    <input type="checkbox" name="agree" value="yes" required <?= isset($existRecord['agree']) && $existRecord['agree'] === 'yes' ? 'checked' : '' ?>>
                    I have read the <a href="#">Parent Contract (Terms and Conditions)</a>, and agree for my child to
                    have instrumental lessons at Bromsgrove School and agree to be bound by them. <span
                        class="required">*</span>
                </label>
            </div>
            <p id="errorMessage" style="color: red; display: none;"></p>
            <div class="Sub-1">

                <input type="submit" value="Submit">
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
                    if (file.size > 2 * 1024 * 1024) {
                        errorMessage.textContent = "File size should not exceed 2 MB.";
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