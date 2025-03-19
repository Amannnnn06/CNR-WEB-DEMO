<?php
include 'create.php';


$sql = 'SELECT * FROM form_confident limit 1';
$qur_result = mysqli_query($conn, $sql);
$ex_record = "";
if (mysqli_num_rows($qur_result) > 0) {
    $row = $qur_result->fetch_assoc();
    if (!empty($row) && isset($row['form_data']) && !empty($row['form_data'])) {
        $ex_record = json_decode($row['form_data'], true);
    }
}
// echo '<pre>';
// print_r($ex_record);
// echo '</pre>';
// exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confidential Information Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>CONFIDENTIAL INFORMATION</h2>
        <p>Is there any information which would allow us to better support your child at Bromsgrove School?
            <br>For example discipline, health issues, history of mental health concerns, multiple school changes,
            sibling/family concerns, history of bullying.
            <span class="required">*</span>
        </p>
        <form action="insert.php" method="POST">
            <div class="radio-group">
                <label>
                    <input <?= (isset($ex_record['confidential']) && $ex_record['confidential'] == 'yes') ? 'checked' : '' ?> type="radio" name="confidential" value="yes" > YES
                </label>
                <label>
                    <input <?= (isset($ex_record['confidential']) && $ex_record['confidential'] == 'no') ? 'checked' : '' ?> type="radio" name="confidential" value="no"> NO
                </label>
            </div>
            <div id="details-section" class="hidden" id="hidediv" <?= (isset($ex_record['confidential']) && $ex_record['confidential'] == 'yes') ? '' : 'style="display: none;"' ?>>
                <label for="details">If yes, please give details. <span class="required">*</span></label><br>
                <textarea id="details" name="details" placeholder="e.g. discipline, health issues, history of mental health concerns"><?= (isset($ex_record['details']) && !empty($ex_record['details'])) ? $ex_record['details'] : '' ?></textarea>
            </div>
            <p id="error-message" class="error-message"></p>
            <p id="textarea-error" class="error-message"></p>
            <div class="button-wrapper">
                <button type="submit" id="submitBtn">Submit</button>

            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>