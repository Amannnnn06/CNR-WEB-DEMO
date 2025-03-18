<?php
include 'create.php';
$sql_check = "SELECT * FROM form_drama  limit 1";
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drama Department Form</title>
    <link rel="stylesheet" href="myclass.css">
    
</head>

<body>

    <div class="container">
        <h2>Bromsgrove has a thriving Drama Department and students are encouraged to take part in the many productions,
            whether this be as an actor, musician or as part of the production team.</h2>

        <div class="question">
            If your child is interested please complete the form below, alternatively, please click No to be directed to
            the next page.
            <span class="required">* Required field</span>
        </div>

        <form action="insert.php" method="POST">
            <input type="hidden" name="id" id="id" value="<!-- ID of the existing record -->">

            <div class="radio-group">
                <input <?= (isset($existRecord['interest']) && $existRecord['interest'] == 'Yes') ? 'checked' : '' ?>
                    type="radio" id="yes" name="interest" value="Yes" required>
                <label for="yes">Yes</label>

                <input <?= (isset($existRecord['interest']) && $existRecord['interest'] == 'No') ? 'checked' : '' ?>
                    type="radio" id="no" name="interest" value="No" required>
                <label for="no">No</label>

            </div>


            <div class="container form-container" id="queDiv" <?= (isset($existRecord['interest']) && $existRecord['interest'] == 'Yes') ? '' : 'style="display: none;"' ?>>

                <div class="question-section">
                    <p class="question-text">
                        Has your child appeared in a school play before?:
                        <span class="required">* Required field</span>
                    </p>
                    <div class="radio-group">
                        <input <?= (isset($existRecord['school-play']) && $existRecord['school-play'] == 'yes') ? 'checked' : '' ?> type="radio" value="yes" name="school-play">
                        <label for="school-play-yes">Yes</label>

                        <input <?= (isset($existRecord['school-play']) && $existRecord['school-play'] == 'nes') ? 'checked' : '' ?> type="radio" value="no" name="school-play">
                        <label for="school-play-no">No</label>
                    </div>
                    <div class="scholtext" id="ScholDiv" <?= (isset($existRecord['school-play']) && $existRecord['school-play'] == 'yes') ? '' : 'style="display: none;"' ?>>
                        <label>If Yes please tell us the play(s) and the role(s) you have performed: <span
                                class="required">* Required field</span></label>
                        <textarea type="text" placeholder="play(s) and role(s) you have performed" row="3"
                            name="schoolText"><?= (isset($existRecord['schoolText']) && !empty($existRecord['schoolText'])) ? $existRecord['schoolText'] : '' ?></textarea>
                    </div>
                </div>


                <div class="question-section">
                    <p class="question-text">
                        Has your child ever been involved in a theatre production outside school?:
                        <span class="required">* Required field</span>
                    </p>
                    <div class="radio-group">
                        <input <?= (isset($existRecord['outside-production']) && $existRecord['outside-production'] == 'yes') ? 'checked' : '' ?> type="radio" value="yes"
                            name="outside-production">
                        <label for="outside-production-yes">Yes</label>

                        <input <?= (isset($existRecord['outside-production']) && $existRecord['outside-production'] == 'no') ? 'checked' : '' ?> type="radio" value="no"
                            name="outside-production">
                        <label for="outside-production-no">No</label>
                    </div>
                    <div class="scholtext" id="outsideDiv" <?= (isset($existRecord['outside-production']) && $existRecord['outside-production'] == 'yes') ? '' : 'style="display: none;"' ?>>
                        <label>If Yes please tell us where you performed and the name of the group with whom you
                            performed.: <span class="required">* Required field</span></label>
                        <textarea type="text" placeholder="Name of the group with whom you performed"
                            name="outsideText"><?= (isset($existRecord['outsideText']) && !empty($existRecord['outsideText'])) ? $existRecord['outsideText'] : '' ?></textarea>
                    </div>
                </div>

                <div class="question-section">
                    <p class="question-text">
                        The school has outstanding new theatre facilities and all technical aspects of productions
                        are undertaken by pupils at Bromsgrove (under professional supervision). Would your child be
                        interested in becoming involved in a production helping with:
                    </p>

                    <div class="helper-options">
                        <div class="helper-item">
                            <label>Lighting: <span class="required">* Required field</span></label>
                            <div class="radio-group">
                                <input <?= (isset($existRecord['lighting']) && $existRecord['lighting'] == 'Yes') ? 'checked' : '' ?> type="radio" id="lighting-yes" name="lighting" value="Yes"
                                    required>
                                <label for="lighting-yes">Yes</label>

                                <input <?= (isset($existRecord['lighting']) && $existRecord['lighting'] == 'No') ? 'checked' : '' ?> type="radio" id="lighting-no" name="lighting" value="No" required>
                                <label for="lighting-no">No</label>
                            </div>
                        </div>

                        <div class="helper-item">
                            <label>Sound: <span class="required">* Required field</span></label>
                            <div class="radio-group">
                                <input <?= (isset($existRecord['sound']) && $existRecord['sound'] == 'Yes') ? 'checked' : '' ?> type="radio" id="sound-yes" name="sound" value="Yes" required>
                                <label for="sound-yes">Yes</label>

                                <input <?= (isset($existRecord['sound']) && $existRecord['sound'] == 'No') ? 'checked' : '' ?> type="radio" id="sound-no" name="sound" value="No" required>
                                <label for="sound-no">No</label>
                            </div>
                        </div>

                        <div class="helper-item">
                            <label>Set Construction: <span class="required">* Required field</span></label>
                            <div class="radio-group">
                                <input <?= (isset($existRecord['set-construction']) && $existRecord['set-construction'] == 'Yes') ? 'checked' : '' ?> type="radio"
                                    id="set-construction-yes" name="set-construction" value="Yes" required>
                                <label for="set-construction-yes">Yes</label>

                                <input <?= (isset($existRecord['set-construction']) && $existRecord['set-construction'] == 'No') ? 'checked' : '' ?> type="radio"
                                    id="set-construction-no" name="set-construction" value="No" required>
                                <label for="set-construction-no">No</label>
                            </div>
                        </div>

                        <div class="helper-item">
                            <label>Costume: <span class="required">* Required field</span></label>
                            <div class="radio-group">
                                <input <?= (isset($existRecord['costume']) && $existRecord['costume'] == 'Yes') ? 'checked' : '' ?> type="radio" id="costume-yes" name="costume" value="Yes" required>
                                <label for="costume-yes">Yes</label>

                                <input <?= (isset($existRecord['costume']) && $existRecord['costume'] == 'No') ? 'checked' : '' ?> type="radio" id="costume-no" name="costume" value="No" required>
                                <label for="costume-no">No</label>
                            </div>
                        </div>

                        <div class="helper-item">
                            <label>Stage Management or Flying: <span class="required">* Required field</span></label>
                            <div class="radio-group">
                                <input <?= (isset($existRecord['stage-management']) && $existRecord['stage-management'] == 'Yes') ? 'checked' : '' ?> type="radio"
                                    id="stage-management-yes" name="stage-management" value="Yes" required>
                                <label for="stage-management-yes">Yes</label>

                                <input <?= (isset($existRecord['stage-management']) && $existRecord['stage-management'] == 'No') ? 'checked' : '' ?> type="radio"
                                    id="stage-management-no" name="stage-management" value="No" required>
                                <label for="stage-management-no">No</label>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="question-section">
                    <p class="question-text">
                        Has your child ever worked backstage for a production in school or outside school before?:
                        <span class="required">* Required field</span>
                    </p>
                    <div class="radio-group">
                        <input type="radio" value="yes" name="backstage" <?= (isset($existRecord['backstage']) && $existRecord['backstage'] == 'yes') ? 'checked' : '' ?>>
                        <label for="backstage-yes">Yes</label>

                        <input type="radio" value="no" name="backstage"  <?= (isset($existRecord['backstage']) && $existRecord['backstage'] == 'no') ? 'checked' : '' ?>>
                        <label for="backstage-no">No</label>
                    </div>
                    <div class="scholtext" id="backstageDIv" <?= (isset($existRecord['backstage']) && $existRecord['backstage'] == 'yes') ? '' : 'style="display: none;"' ?>>
                        <label>If yes please give details of any backstage experience: <span class="required">* Required
                                field</span></label>
                        <textarea type="text" placeholder="Please give details of any backstage experience"
                            name="BackstageText"><?= (isset($existRecord['BackstageText']) && !empty($existRecord['BackstageText'])) ? $existRecord['BackstageText'] : '' ?></textarea>
                    </div>
                </div>
                <div class="question-section">
                    <p class="question-text">
                        Does your child attend classes outside school in Dance or Acting?:
                        <span class="required">* Required field</span>
                    </p>
                    <div class="radio-group">
                        <input type="radio" value="yes" name="dance-acting" <?= (isset($existRecord['dance-acting']) && $existRecord['dance-acting'] == 'yes') ? 'checked' : '' ?>>
                        <label for="dance-acting-yes">Yes</label>

                        <input type="radio" value="no" name="dance-acting"  <?= (isset($existRecord['dance-acting']) && $existRecord['dance-acting'] == 'no') ? 'checked' : '' ?>>
                        <label for="dance-acting-no">No</label>
                    </div>
                    <div id="Dancediv" <?= (isset($existRecord['dance-acting']) && $existRecord['dance-acting'] == 'yes') ? '' : 'style="display: none;"' ?>>
                        <label>Please give details of any Drama or Acting Classes your child attends outside of
                            school<span class="required">* Required field</span></label>
                        <textarea type="text"
                            placeholder="Please give details of any Drama or Acting Classes your child attends outside of school"
                            name="danceText"><?= (isset($existRecord['danceText']) && !empty($existRecord['danceText'])) ? $existRecord['danceText'] : '' ?></textarea>
                    </div>
                </div>

            </div>



            <div class="links">
                <p>We would encourage all students interested in the Performing Arts to contact our
                    <a href="#">Director of Music Mr Tim Norton</a>
                    to enquire about the opportunities on offer. Our Performing Arts Calendar can be viewed on the
                    <a href="#">School Website</a>.
                </p>
            </div>
            <div class="button-container">
                <button type="submit" class="submit-btn">Submit</button>
            </div>
        </form>


    </div>
    <script src="myscript.js"></script>
</body>

</html>