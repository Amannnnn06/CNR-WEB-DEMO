<?php include 'create_tab.php';

$sql_check = "SELECT * FROM Lang_bg limit 1";
$queryResult = mysqli_query($conn, $sql_check);
$existRecord = '';
if (mysqli_num_rows($queryResult) > 0) {
    $fetchRow = $queryResult->fetch_assoc();
    if (!empty($fetchRow) && isset($fetchRow['form_data']) && !empty($fetchRow['form_data'])) {
        $existRecord = json_decode($fetchRow['form_data'], true);
    }
}
$sql = "SELECT form_data FROM Lang_bg LIMIT 1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

// $existRecord = json_decode($fetchRow['form_data'], true);
// if (json_last_error() !== JSON_ERROR_NONE) {
//     echo "JSON Error: " . json_last_error_msg();
//     exit;
// }else{
// echo '<pre>';
// print_r($existRecord);
// echo '</pre>';
// exit;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Background Form</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">
        <h2>Language Background Form</h2>
        <form id="uploadForm" action="insert_update.php" method="POST" enctype="multipart/form-data">
            <label for="first-language">First language spoken. <span class="required">*</span></label>
            <div class="input-container">
                <span class="icon">&#127987;</span>
                <input
                      value="<?= (isset($existRecord['first_language']) && !empty($existRecord['first_language'])) ? $existRecord['first_language'] : '' ?>"
                    type="text" name="first_language" placeholder="First Language" required>
            </div>

            <label>Is your child multilingual (speaks and writes in two or more languages with equal fluency)? <span
                    class="required">*</span></label>
            <div class="radio-group">
                <input <?= (isset($existRecord['multilingual']) && $existRecord['multilingual'] == 'yes') ? 'checked' : '' ?>  type="radio" name="multilingual" value="yes" required> Yes
                <input <?= (isset($existRecord['multilingual']) && $existRecord['multilingual'] == 'no') ? 'checked' : '' ?>   type="radio" name="multilingual" value="no" required> No
            </div>

            <div class="checkbox-group" id="checkboxes" <?= (isset($existRecord['multilingual']) && $existRecord['multilingual'] == 'yes') ? '' : 'style="display: none;"' ?>>
                <label>If yes, please complete below:<span class="required">* Required field</span></label>
                <input type="checkbox" name="eng" value="english" <?= (isset($existRecord['languages_spoken']) && in_array('english', $existRecord['languages_spoken'])) ? 'checked' : '' ?>><label>ENGLISH</label><br>
                <input type="checkbox" name="fren" value="french" <?= (isset($existRecord['languages_spoken']) && in_array('french', $existRecord['languages_spoken'])) ? 'checked' : '' ?>>
                <label>FRENCH</label>
                <input type="checkbox" name="germ" value="german" <?= (isset($existRecord['languages_spoken']) && in_array('german', $existRecord['languages_spoken'])) ? 'checked' : '' ?>>
                <label>GERMAN</label>

                <input type="checkbox" name="mand" value="mandarin" <?= (isset($existRecord['languages_spoken']) && in_array('mandarin', $existRecord['languages_spoken'])) ? 'checked' : '' ?>>
                <label>MANDARIN</label>

                <input type="checkbox" name="russ" value="russian" <?= (isset($existRecord['languages_spoken']) && in_array('russian', $existRecord['languages_spoken'])) ? 'checked' : '' ?>>
                <label>RUSSIAN</label>

                <input type="checkbox" name="span" value="spanish" <?= (isset($existRecord['languages_spoken']) && in_array('spanish', $existRecord['languages_spoken'])) ? 'checked' : '' ?>>
                <label>SPANISH</label>

                <input type="checkbox" name="oth" value="other" <?= (isset($existRecord['languages_spoken']) && in_array('other', $existRecord['languages_spoken'])) ? 'checked' : '' ?>>
            </div>


            <label>Other languages written and spoken fluently? <span class="required">*</span></label>
            <div class="radio-group">
                <input type="radio" name="other-languages" value="yes" required
                    <?= (isset($existRecord['other-languages']) && $existRecord['other-languages'] == 'yes') ? 'checked' : '' ?>> Yes
                <input type="radio" name="other-languages" value="no" required
                    <?= (isset($existRecord['other-languages']) && $existRecord['other-languages'] == 'no') ? 'checked' : '' ?>> No
            </div>
            <div id="other-lang" <?= (isset($existRecord['other-languages']) && $existRecord['other-languages'] == 'yes') ? '' : 'style="display: none;"' ?>>
                <label>If yes, please complete below:<span class="required">* Required field</span></label>
                <input type="text" name="other_lang" placeholder="Other fluent language.."
                    value="<?= (isset($existRecord['other_lang']) && !empty($existRecord['other_lang'])) ? $existRecord['other_lang'] : '' ?>">

            </div>

            <label>Has your child previously received EAL support? <span class="required">*</span></label>
            <div class="radio-group">
                <input type="radio" name="eal-support" value="yes" required <?= (isset($existRecord['eal-support']) && $existRecord['eal-support'] == 'yes') ? 'checked' : '' ?>> Yes
                <input type="radio" name="eal-support" value="no" required <?= (isset($existRecord['eal-support']) && $existRecord['eal-support'] == 'no') ? 'checked' : '' ?>> No
            </div>

            <p class="section-title">LATIN:</p>
            <label>Has your child ever studied Latin? <span class="required">*</span></label>
            <div class="radio-group">
                <input type="radio" name="latin" value="yes" required <?= (isset($existRecord['latin']) && $existRecord['latin'] == 'yes') ? 'checked' : '' ?>> Yes
                <input type="radio" name="latin" value="no" required <?= (isset($existRecord['latin']) && $existRecord['latin'] == 'no') ? 'checked' : '' ?>> No
            </div>
            <div id="latindiv" <?= (isset($existRecord['latin']) && $existRecord['latin'] == 'yes') ? '' : 'style="display: none;"' ?>>
                <label>Please indicate for how many years your child has studied LATIN?</label>
                <input type="text" name="latinyear" placeholder="LATIN"
                    value="<?= (isset($existRecord['latinyear']) && !empty($existRecord['latinyear'])) ? $existRecord['latinyear'] : '' ?>">
            </div>

            <p class="section-title">FRENCH:</p>
            <label>Has your child ever studied French? <span class="required">*</span></label>
            <div class="radio-group">
                <input type="radio" name="french" value="yes" required <?= (isset($existRecord['french']) && $existRecord['french'] == 'yes') ? 'checked' : '' ?>> Yes
                <input type="radio" name="french" value="no" required <?= (isset($existRecord['french']) && $existRecord['french'] == 'no') ? 'checked' : '' ?>> No
            </div>
            <div id="frenchdiv" <?= (isset($existRecord['french']) && $existRecord['french'] == 'yes') ? '' : 'style="display: none;"' ?>>
                <label>Please indicate for how many years your child has studied FRENCH?</label>
                <input type="text" name="frenchyear" placeholder="FRENCH"
                    value="<?= (isset($existRecord['frenchyear']) && !empty($existRecord['frenchyear'])) ? $existRecord['frenchyear'] : '' ?>">
            </div>

            <label>OTHER LANGUAGES</label>
            <div style="display:flex; flex-direction:column; justify-content:left;">
                <label>Has your child studied any other languages?<span class="required">*</span></label>
                <div class="radio-group">
                    <input type="radio" name="others" value="yes" required <?= (isset($existRecord['others']) && $existRecord['others'] == 'yes') ? 'checked' : '' ?> />Yes
                    <input type="radio" name="others" value="no" required <?= (isset($existRecord['others']) && $existRecord['others'] == 'no') ? 'checked' : '' ?> />no
                </div>

            </div>

            <div id="div-other" <?= (isset($existRecord['others']) && $existRecord['others'] == 'yes') ? '' : 'style="display: none;"' ?>>
                <label>Other language studied. <span class="required">*</span></label>

                <input type="text" name="other-text" placeholder="Other language studied"
                    value="<?= (isset($existRecord['other-text']) && !empty($existRecord['other-text'])) ? $existRecord['other-text'] : '' ?>">

                <label>Please indicate how many years your child has studied the language/s <span
                        class="required">*</span></label>
                <input type="text" name="other-text1" placeholder="How many year studied the language"
                    value="<?= (isset($existRecord['other-text1']) && !empty($existRecord['other-text1'])) ? $existRecord['other-text1'] : '' ?>">

            </div>
            <div class="">
                <label>ACADEMIC SUPPORT:</label>
                <p>If your child has been receiving support in their current school, or there have been conversations
                    with teachers or medical professionals regarding a suspected or formally diagnosed difficulty, you
                    must disclose and upload all relevant information.</p>

                <label>Does your child currently receive, or have they previously received, extra lessons of support?
                    <span class="required">*</span></label>
                <div class="radio-group">
                    <input type="radio" name="support" value="yes" <?= (isset($existRecord['support']) && $existRecord['support'] == 'yes') ? 'checked' : '' ?>> Yes
                    <input type="radio" name="support" value="no" <?= (isset($existRecord['support']) && $existRecord['support'] == 'no') ? 'checked' : '' ?>> No
                </div>
                <div class="support" id="support-id" <?= (isset($existRecord['support']) && $existRecord['support'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <label>How often does your child have these lessons ?<span class="required">*</span></label>
                    <input type="text" name="support-1" placeholder="How often does your child have these lessons ?"
                        value="<?= (isset($existRecord['support-1']) && !empty($existRecord['support-1'])) ? $existRecord['support-1'] : '' ?>">
                    <label>How long have these lessons been taking place ?<span class="required">*</span></label>
                    <input type="text" name="support-2" placeholder="How long have these lessons been taking place ?"
                        value="<?= (isset($existRecord['support-2']) && !empty($existRecord['support-2'])) ? $existRecord['support-2'] : '' ?>">
                </div>
                <label>Does your child currently receive, or have they previously received, any other form of support
                    which is additional to the typical school experience for pupils at their school?
                    <span class="required">*</span></label>
                <div class="radio-group">
                    <input type="radio" name="experience" value="yes" <?= (isset($existRecord['experience']) && $existRecord['experience'] == 'yes') ? 'checked' : '' ?> />Yes
                    <input type="radio" name="experience" value="no" <?= (isset($existRecord['experience']) && $existRecord['experience'] == 'no') ? 'checked' : '' ?> />No
                </div>

                <div id="Exp-div" <?= (isset($existRecord['experience']) && $existRecord['experience'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <label>Please provide details here<span class="required">*</span></label>
                    <input type="text" name="exp-detail" placeholder="Please provide details here"
                        value="<?= (isset($existRecord['exp-detail']) && !empty($existRecord['exp-detail'])) ? $existRecord['exp-detail'] : '' ?>" />
                </div>


                <div>
                    <label>If available please upload copies of the following documents: </label>
                </div>
                <div>
                    <ul>
                        <li>Individual pupil provision map or individual education plan.</li>
                        <li>A report or letter from your child's teacher or SENCo</li>
                        <li>An assessment report from an educational psychologist or other professional qualified in
                            assessing children's learning difficulties. </li>
                        <li>A report or letter from a clinical or health professional, including consultants,
                            counsellors or therapists.</li>
                    </ul>
                </div>
                <div>
                    <h3>Please upload Supporting Documents.</h3>
                    <div class="upload-section">
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
                        <p>Upload file size limit 2 MB</p>
                        <p>Allowed file types: JPG, JPEG, DOC, DOCX, PDF</p>
                        <!-- <button class="upload-btn">Upload image</button> -->
                    </div>

                    <label>Does your child use additional resources/equipment in order to access their education? <span
                            class="required">*</span></label>
                    <br>
                    <div class="radio-group">
                        <input type="radio" id="yes" name="resources" value="yes" <?= (isset($existRecord['resources']) && $existRecord['resources'] == 'yes') ? 'checked' : '' ?>>Yes
                        <input type="radio" id="no" name="resources" value="no" <?= (isset($existRecord['resources']) && $existRecord['resources'] == 'no') ? 'checked' : '' ?>>NO
                    </div>
                </div>
                <div class="resource-checkbox-group" id="resourcesDiv" <?= (isset($existRecord['resources']) && $existRecord['resources'] == 'yes') ? '' : 'style="display: none;"' ?>>
                    <label>
                        <input type="checkbox" name="resource_laptop" value="A laptop"
                            <?= (isset($existRecord['ResourcesCheck']) && in_array("A laptop", $existRecord['ResourcesCheck'])) ? 'checked' : '' ?>>
                        A laptop to complete the majority or all of their classwork and exams instead of writing by hand
                    </label>

                    <label>
                        <input type="checkbox" name="resource_writing_slope" value="A writing slope"
                            <?= (isset($existRecord['ResourcesCheck']) && in_array("A writing slope", $existRecord['ResourcesCheck'])) ? 'checked' : '' ?>>
                        A writing slope
                    </label>

                    <label>
                        <input type="checkbox" name="resource_reader_scribe" value="reader or scribe"
                            <?= (isset($existRecord['ResourcesCheck']) && in_array("reader or scribe", $existRecord['ResourcesCheck'])) ? 'checked' : '' ?>>
                        An adult to act as a reader or scribe
                    </label>

                    <label>
                        <input type="checkbox" name="resource_special_papers" value="Specialised papers"
                            <?= (isset($existRecord['ResourcesCheck']) && in_array("Specialised papers", $existRecord['ResourcesCheck'])) ? 'checked' : '' ?>>
                        Specialised papers or books (size, colour, etc.)
                    </label>

                    <label>
                        <input type="checkbox" name="resource_sensory" value="Other specific"
                            <?= (isset($existRecord['ResourcesCheck']) && in_array("Other specific", $existRecord['ResourcesCheck'])) ? 'checked' : '' ?>>
                        Other specific resources due to a sensory impairment
                    </label>

                    <label>
                        <input type="checkbox" name="resource_other" value="Other"
                            <?= (isset($existRecord['ResourcesCheck']) && in_array("Other", $existRecord['ResourcesCheck'])) ? 'checked' : '' ?>>
                        Other resources not listed above
                    </label>
                </div>
                <p id="errorMessage" style="color: red; display: none;"></p>

                <div class="Sub-1">
                    <input type="submit">
                </div>

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



                    