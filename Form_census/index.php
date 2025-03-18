<?php
 include 'table.php';

$sql='SELECT * FROM census limit 1';
$qur_result = mysqli_query($conn, $sql);
$ex_record ="";
if (mysqli_num_rows($qur_result) > 0) {
    $row =$qur_result->fetch_assoc();
    if (!empty($row) && isset($row['form_data']) && !empty($row['form_data'])) {
        $ex_record = json_decode($row['form_data'], true);
    }
}


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Census Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Census Form</h2>
        <label class="lab">We are required to record the following information regarding pupils' ethnic classification.</label>
        <label class="lab">Please select appropriately.<span class="required">* Required field</span></label>
        <form action="insert.php" method="post">
        <input type="hidden" name="id" id="id" value="<!-- ID of the existing record -->">
            <div class="form-row">
                <div class="form-f">
                    <label class="lab1">White</label>
                    <label><input type="radio" name="census" value="british" <?= (isset($ex_record['census']) && $ex_record['census'] === 'british') ? 'checked' : '' ?>> British</label>
                    <label><input type="radio" name="census" value="irish" <?= (isset($ex_record['census']) && $ex_record['census'] === 'irish') ? 'checked' : '' ?>> Irish</label>
                    <label><input type="radio" name="census" value="other"<?= (isset($ex_record['census']) && $ex_record['census'] === 'other') ? 'checked' : '' ?>> Any Other White Background</label>
                
                </div>
                <div class="form-f">
                    <label class="lab1">Black or Black British</label>
                    <label><input type="radio" name="census" value="caribbean" <?= (isset($ex_record['census']) && $ex_record['census'] === 'caribbean') ? 'checked' : '' ?>> Caribbean</label>
                    <label><input type="radio" name="census" value="african" <?= (isset($ex_record['census']) && $ex_record['census'] === 'african') ? 'checked' : '' ?>> African</label>
                    <label><input type="radio" name="census" value="other1" <?= (isset($ex_record['census']) && $ex_record['census'] === 'other1') ? 'checked' : '' ?>> Any Other Black Background</label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-f">
                    <label class="lab1">Mixed</label>
                    <label><input type="radio" name="census" value="white_black_caribbean" <?= (isset($ex_record['census']) && $ex_record['census'] === 'white_black_caribbean') ? 'checked' : '' ?>> White and Black
                        Caribbean</label>
                    <label><input type="radio" name="census" value="white_black_african"<?= (isset($ex_record['census']) && $ex_record['census'] === 'white_black_african') ? 'checked' : '' ?>> White and Black
                        African</label>
                    <label><input type="radio" name="census" value="white_asian" <?= (isset($ex_record['census']) && $ex_record['census'] === 'white_asian') ? 'checked' : '' ?>> White and Asian</label>
                    <label><input type="radio" name="census" value="other3" <?= (isset($ex_record['census']) && $ex_record['census'] === 'other3') ? 'checked' : '' ?>> Any Other Mixed Background</label>
                </div>


  
                <div class="form-f">
                    <label class="lab1" >Asian or Asian British</label>

                    <label><input type="radio" name="census" value="indian" <?= (isset($ex_record['census']) && $ex_record['census'] === 'indian') ? 'checked' : '' ?>> Indian</label>
                    <label><input type="radio" name="census" value="pakistani" <?= (isset($ex_record['census']) && $ex_record['census'] === 'pakistani') ? 'checked' : '' ?>> Pakistani</label>
                    <label><input type="radio" name="census" value="bangladeshi" <?= (isset($ex_record['census']) && $ex_record['census'] === 'bangladeshi') ? 'checked' : '' ?>> Bangladeshi</label>
                    <label><input type="radio" name="census" value="other4" <?= (isset($ex_record['census']) && $ex_record['census'] === 'other4') ? 'checked' : '' ?>> Any Other Asian Background</label>

                </div>
            </div>
            <div class="form-row">
                <div class="form-f">
                    <label class="lab1">Other</label>


                    <label><input type="radio" name="census" value="chinese" <?= (isset($ex_record['census']) && $ex_record['census'] === 'chinese') ? 'checked' : '' ?> > Chinese</label>
                    <label><input type="radio" name="census" value="other5"<?= (isset($ex_record['census']) && $ex_record['census'] === 'other5') ? 'checked' : '' ?>> Any Other Ethnic Group</label>
                </div>


                <div class="form-f">
                    <label class="lab1">Prefer not to disclose</label>

                    <label><input type="radio" name="census" value="not_disclose"<?= (isset($ex_record['census']) && $ex_record['census'] === 'not_disclose') ? 'checked' : '' ?>> Not disclose</label>
                </div>
                
            </div>
            <p id="censusError" class="error-message"></p>
            <div class="form-f">
                <label class="lab1">British pupils with parents in the HM forces <span class="required">* Required field</span></label>
                <label><input type="radio" name="hm_force" value="yes" <?= (isset($ex_record['hm_force']) && $ex_record['hm_force'] == 'yes') ? 'checked' : '' ?> > Yes</label>
                <label><input type="radio" name="hm_force" value="no"<?= (isset($ex_record['hm_force']) && $ex_record['hm_force'] == 'no') ? 'checked' : '' ?> > No</label>
                <p id="hmForceError" class="error-message"></p>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>