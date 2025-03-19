<?php
include 'general_table.php';
$sql_check = "SELECT * FROM form_general limit 1";
$queryResult = mysqli_query($conn, $sql_check);
$existRecord = '';
if (mysqli_num_rows($queryResult) > 0) {
    $fetchRow = $queryResult->fetch_assoc();
    if (!empty($fetchRow) && isset($fetchRow['form_data']) && !empty($fetchRow['form_data'])) {
        $existRecord = json_decode($fetchRow['form_data'], true);
    }
}
// echo '<pre>';
// print_r($existRecord);
// echo '</pre>';
// exit;
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Emergency Contact Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-container">
        <h1>General Form </h1>
        <h2>Please supply names and contact information of people other than the child's Mother or Father who can be
            contacted in an emergency or have permission to regularly collect the child from School.</h2>
        <p>The School may not have facilities to look after sick children.</p>

        <form action="general_insert.php" method="post">
            <table>
                <tr>
                    <th>Full Name</th>
                    <th>Relationship to Child</th>
                    <th>Contact Telephone Number</th>
                    <th>Can be contacted in an emergency</th>
                    <th>Has permission to collect the child from School</th>
                </tr>
                <tr>
                    <td><input type="text" name="full_name" placeholder="Full name" required
                            value="<?= (isset($existRecord['first_name']) && !empty($existRecord['first_name'])) ? $existRecord['first_name'] : '' ?>">
                    </td>
                    <td><input type="text" name="relation" placeholder="Relationship" required
                            value="<?= (isset($existRecord['relation']) && !empty($existRecord['relation'])) ? $existRecord['relation'] : '' ?>">
                    </td>
                    <td><input type="tel" name="telephone" placeholder="Telephone Number" required
                            value="<?= (isset($existRecord['telephone']) && !empty($existRecord['telephone'])) ? $existRecord['telephone'] : '' ?>">
                    </td>
                    <td><input type="checkbox" name="emergency" value="yes" <?= (isset($existRecord['emergency']) && $existRecord['emergency'] === 'yes') ? 'checked' : ''; ?>></td>
                    <td><input type="checkbox" name="permission_collect" value="yes"
                            <?= (isset($existRecord['permission_collect']) && $existRecord['permission_collect'] === 'yes') ? 'checked' : ''; ?>></td>
                </tr>
            </table>

            <!-- <button type="button" class="add-more">+ Add More</button> -->

            <div class="form-group">
                <p>To ensure that we together offer consistent care and education, will your child be cared for at
                    another setting or child care provider during the week? <span class="required">*</span></p>
                <label><input type="radio" name="other_care_provider" value="yes" required
                        <?= (isset($existRecord['other_care_provider']) && $existRecord['other_care_provider'] == 'yes') ? 'checked' : '' ?>> YES</label>
                <label><input type="radio" name="other_care_provider" value="no"
                        <?= (isset($existRecord['other_care_provider']) && $existRecord['other_care_provider'] == 'no') ? 'checked' : '' ?>> NO</label>
            </div>

            <div class="form-section" id="CareDiv" <?= (isset($existRecord['other_care_provider']) && $existRecord['other_care_provider'] == 'yes') ? '' : 'style="display: none;"' ?>>
                <p class="section-question">
                    Please give details
                    <span class="required">* Required field</span>
                </p>
                <div class="textarea-wrapper">
                    <div class="icon-container">
                        <i class="edit-icon">✎</i>
                    </div>
                    <textarea name="careText"
                        placeholder="Please give details"><?= (isset($existRecord['careText']) && !empty($existRecord['careText'])) ? $existRecord['careText'] : '' ?></textarea>
                </div>
            </div>



            <div class="form-group">
                <p>I give permission for my child to have sun screen applied as and when necessary. <span
                        class="required">*</span></p>
                <label><input type="radio" name="sunscreen" value="yes" required <?= (isset($existRecord['sunscreen']) && $existRecord['sunscreen'] == 'yes') ? 'checked' : '' ?>> Yes</label>
                <label><input type="radio" name="sunscreen" value="no" <?= (isset($existRecord['sunscreen']) && $existRecord['sunscreen'] == ']no') ? 'checked' : '' ?>> No</label>
            </div>

            <div class="form-group">
                <p>Please indicate if your child is to have milk this year. <span class="required">*</span></p>
                <label><input type="radio" name="milk" value="yes" required <?= (isset($existRecord['milk']) && $existRecord['milk'] == 'yes') ? 'checked' : '' ?>> Yes</label>
                <label><input type="radio" name="milk" value="no" <?= (isset($existRecord['milk']) && $existRecord['milk'] == 'no') ? 'checked' : '' ?>> No</label>
            </div>

            <div class="form-group">
                <p>Is your child <span class="required">*</span></p>
                <label><input type="radio" name="handedness" value="left" required <?= (isset($existRecord['handedness']) && $existRecord['handedness'] == 'left') ? 'checked' : '' ?>> Left Handed</label>
                <label><input type="radio" name="handedness" value="right" <?= (isset($existRecord['handedness']) && $existRecord['handedness'] == 'right') ? 'checked' : '' ?>> Right Handed</label>
                <label><input type="radio" name="handedness" value="undecided" <?= (isset($existRecord['handedness']) && $existRecord['handedness'] == 'undecided') ? 'checked' : '' ?>> Undecided</label>
            </div>

            <div class="form-group">
                <p>I/We give permission for School staff to clean and change my child in the event that my child soils
                    him/herself. <span class="required">*</span></p>
                <label><input type="radio" name="clean_child" value="yes" required
                        <?= (isset($existRecord['clean_child']) && $existRecord['clean_child'] == 'yes') ? 'checked' : '' ?>> Yes</label>
                <label><input type="radio" name="clean_child" value="no" <?= (isset($existRecord['clean_child']) && $existRecord['clean_child'] == 'no') ? 'checked' : '' ?>> No</label>
            </div>

            <div class="intimate-care-section">
                <h3>Intimate Care Permission</h3>


                <p class="section-subtitle">Nappy Changing</p>

                <label class="checkbox-container">
                    <input type="checkbox" name="nappy_not_applicable" id="NotApply" value="yes"
                        <?= (isset($existRecord['nappy_not_applicable']) && $existRecord['nappy_not_applicable'] === 'yes') ? 'checked' : ''; ?>>
                    <span>Not applicable</span>
                </label>
                <div id="notapply">
                    <p class="section-subtitle">I/We give permission for Bromsgrove School staff to:</p>

                    <label class="checkbox-container">
                        <input type="checkbox" name="nappy" id="nappy" value="yes" <?= (isset($existRecord['nappy']) && $existRecord['nappy'] === 'yes') ? 'checked' : ''; ?>>
                        <span>Change my child's nappy</span>
                    </label>

                    <label class="checkbox-container">
                        <input type="checkbox" name="wipes" id="wipes" value="yes" <?= (isset($existRecord['wipes']) && $existRecord['wipes'] === 'yes') ? 'checked' : ''; ?>>
                        <span>Use the ‘baby wipes' that I/we provide for my child</span>
                    </label>

                    <label class="checkbox-container">
                        <input type="checkbox" name="cream" id="cream" value="yes" <?= (isset($existRecord['cream']) && $existRecord['cream'] === 'yes') ? 'checked' : ''; ?>>
                        <span>Apply any cream that I provide in order to prevent nappy rash</span>
                    </label>

                    <div class="form-section">
                        <p>Any other parental requirements:<span class="required">* Required field</span></p>
                        <div class="textarea-wrapper">
                            <div class="icon-container">
                                <i class="edit-icon">✎</i>
                            </div>
                            <textarea name="parent_requirements" placeholder="Please give details"
                                rows="3"><?= (isset($existRecord['parent_requirements']) && !empty($existRecord['parent_requirements'])) ? $existRecord['parent_requirements'] : '' ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>Family Life</h3>
                <p>
                    Important people in your child's life, recent house move, change in family circumstances, languages
                    spoken at home, important celebrations, festivals or events that you share as a family.
                    <span class="required">* Required field</span>
                </p>

                <div class="textarea-wrapper">
                    <div class="icon-container">
                        <i class="edit-icon">✎</i>
                    </div>
                    <textarea name="family_details" placeholder="Please give details" rows="3"
                        required><?= (isset($existRecord['family_details']) && !empty($existRecord['family_details'])) ? $existRecord['family_details'] : '' ?></textarea>
                </div>
            </div>

            <div class="form-section">
                <h3>Personal Care</h3>

                <p>
                    Does your child need help to use the lavatory?
                    <span class="required">*</span>
                </p>

                <div class="radio-group">
                    <label><input type="radio" name="lavatory_help" value="yes" <?= (isset($existRecord['lavatory_help']) && $existRecord['lavatory_help'] == 'yes') ? 'checked' : '' ?> required> Yes</label>
                    <label><input type="radio" name="lavatory_help" value="no" <?= (isset($existRecord['lavatory_help']) && $existRecord['lavatory_help'] == 'no') ? 'checked' : '' ?>> No</label>
                </div>

                <p>
                    How established are toileting routines, what may they need to attend to their own personal hygiene,
                    how do they let you know when they need the toilet?
                    <span class="required">* Required field</span>
                </p>

                <div class="textarea-wrapper">
                    <div class="icon-container">
                        <i class="edit-icon">✎</i>
                    </div>
                    <textarea name="toilet" placeholder="Please give details" rows="3"
                        required><?= (isset($existRecord['toilet']) && !empty($existRecord['toilet'])) ? $existRecord['toilet'] : '' ?></textarea>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title">Daily Routines</h3>
                <p class="section-question">
                    How does your child deal with a change to routine, do they have a special comforter, do they
                    understand simple rules for safety, how might your child deal with you leaving them with us?
                    <span class="required">* Required field</span>
                </p>
                <div class="textarea-wrapper">
                    <div class="icon-container">
                        <i class="edit-icon">✎</i>
                    </div>
                    <textarea name="daily_routines" placeholder="Please give details" rows="3"
                        required><?= (isset($existRecord['daily_routines']) && !empty($existRecord['daily_routines'])) ? $existRecord['daily_routines'] : '' ?></textarea>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title">Emotional and Social Skills</h3>
                <p class="section-question">
                    Is your child used to being left with others, how well do they handle their emotions, how do they
                    relate to familiar and unfamiliar children and adults, what makes them sad or upset?
                    <span class="required">* Required field</span>
                </p>
                <div class="textarea-wrapper">
                    <div class="icon-container">
                        <i class="edit-icon">✎</i>
                    </div>
                    <textarea name="emotional_social" placeholder="Please give details" rows="3"
                        required><?= (isset($existRecord['emotional_social']) && !empty($existRecord['emotional_social'])) ? $existRecord['emotional_social'] : '' ?></textarea>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title">Communication and Language Skills</h3>
                <p class="section-question">
                    How well do they communicate with others, are they easily understood, do they use any special words
                    we need to know?
                    <span class="required">* Required field</span>
                </p>
                <div class="textarea-wrapper">
                    <div class="icon-container">
                        <i class="edit-icon">✎</i>
                    </div>
                    <textarea name="communication_lang" placeholder="Please give details" rows="3"
                        required><?= (isset($existRecord['communication_lang']) && !empty($existRecord['communication_lang'])) ? $existRecord['communication_lang'] : '' ?></textarea>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title">Literacy and Numeracy Skills</h3>
                <p class="section-question">
                    Does your child know any numbers, colours or shapes, enjoy looking at books and listening to
                    stories, do they like to sing, listen to music or dance, do they like to draw, do they try to write,
                    are they able to write any letters of their name?
                    <span class="required">* Required field</span>
                </p>
                <div class="textarea-wrapper">
                    <div class="icon-container">
                        <i class="edit-icon">✎</i>
                    </div>
                    <textarea name="literacy" placeholder="Please give details" rows="3"
                        required><?= (isset($existRecord['literacy']) && !empty($existRecord['literacy'])) ? $existRecord['literacy'] : '' ?></textarea>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title">Physical Development</h3>
                <p class="section-question">
                    Reaching physical milestones or feeding themselves
                    <span class="required">* Required field</span>
                </p>
                <div class="textarea-wrapper">
                    <div class="icon-container">
                        <i class="edit-icon">✎</i>
                    </div>
                    <textarea name="physical" placeholder="Please give details" rows="3"
                        required><?= (isset($existRecord['physical']) && !empty($existRecord['physical'])) ? $existRecord['physical'] : '' ?></textarea>
                </div>

                <p class="section-question">
                    Is there anything not covered above which you feel would be helpful for us to know?
                    <span class="required">* Required field</span>
                </p>
                <div class="textarea-wrapper">
                    <div class="icon-container">
                        <i class="edit-icon">✎</i>
                    </div>
                    <textarea name="additional_info" placeholder="Please give details" rows="3"
                        required><?= (isset($existRecord['additional_info']) && !empty($existRecord['additional_info'])) ? $existRecord['additional_info'] : '' ?></textarea>
                </div>
            </div>

            <div class="submit-container">
                <button type="submit" class="submit-button">Submit</button>
            </div>
        </form>
    </div>
</body>
<script src="myscript.js"></script>

</html>