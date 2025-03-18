<?php
include 'cre_tab.php';
$sql_check = "SELECT * FROM form_sport_boy limit 1";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Participation Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Sports Boys Participation Form</h2>
        <p>We would like to know if your child has played the sports that we offer at Bromsgrove, together with details
            of his level of performance/representation. In addition, if your child is a specialist in a sport not listed
            below, please complete the relevant section of the form, stating none or not applicable where appropriate.
        </p>
        <form action="insert.php" method="POST">
            <input type="hidden" name="id" id="id" value="<!-- ID of the existing record -->">

            <label for="school">Child's Current School <span class="required">*</span></label>

            <input type="text" id="school" name="school" placeholder="Child's Current School" required
                value="<?= (isset($existRecord['school']) && !empty($existRecord['school'])) ? $existRecord['school'] : '' ?>">

            <label>Has your child participated in swimming? <span class="required">*</span></label>
            <div class="radio-group">
                <input type="radio" id="yes" name="swimming" value="yes" <?= (isset($existRecord['swimming']) && $existRecord['swimming'] == 'yes') ? 'checked' : '' ?> required>
                <label for="yes">Yes</label>
                <input type="radio" id="no" name="swimming" value="no" <?= (isset($existRecord['swimming']) && $existRecord['swimming'] == 'no') ? 'checked' : '' ?> required>
                <label for="no">Never participated in swimming</label>
            </div>
            <div id="swim" <?= (isset($existRecord['swimming']) && $existRecord['swimming'] == 'yes') ? '' : 'style="display: none;"' ?>>
                <label> PREFERRED STROKE:</label>
                <input type="text" name="stroke" placeholder="preferred stroke" required
                    value="<?= (isset($existRecord['stroke']) && !empty($existRecord['stroke'])) ? $existRecord['stroke'] : '' ?>">
            </div>
            <div>
                <label for="specialist">If your child is a specialist in a sport not listed above, please give details
                    here:</label>

                <textarea id="specialist" name="specialist" rows="4" placeholder="Please give details"  required><?= (isset($existRecord['specialist']) && !empty($existRecord['specialist'])) ? $existRecord['specialist'] : '' ?></textarea>
            </div>
            <div>
                <label for="medical">If your child has any medical issues which might affect his involvement in sport,
                    please give details here:</label>

                <textarea id="medical" name="medical" rows="4" placeholder="Please give details" required><?= (isset($existRecord['medical']) && !empty($existRecord['medical'])) ? $existRecord['medical'] : '' ?></textarea>
            </div>
            <div class="Sub-1">
                <input type="submit">
            </div>
        </form>
    </div>
    <script>
        var swimradio = document.querySelectorAll('input[name="swimming"]');
        var div_swim = document.getElementById('swim');
        swimradio.forEach(radio => {
            radio.addEventListener("change", function () {
                if (this.value === "yes") {
                    div_swim.style.display = "block";
                    document.querySelector('input[name="stroke"]').setAttribute("required", "required");
                } else {
                    div_swim.style.display = "none";
                    document.querySelector('input[name="stroke"]').removeAttribute("required");
                    document.querySelector('input[name="stroke"]').value = '';
                }
            });
        });

    </script>
</body>

</html>