<?php
include 'bed_table.php';
$sql_check = "SELECT * FROM form_bed limit 1";
$queryResult = mysqli_query($conn, $sql_check);
$existRecord = '';
if (mysqli_num_rows($queryResult) > 0) {
    $fetchRow = $queryResult->fetch_assoc();
    if (!empty($fetchRow) && isset($fetchRow['form_data']) && !empty($fetchRow['form_data'])) {
        $existRecord = json_decode($fetchRow['form_data'], true);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedding Pack Purchase</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 100%;
            background-color: #fff;
            padding: 30px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #333;
        }

        ul {
            margin: 15px 0;
            padding-left: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        .question {
            margin: 25px 0 10px;
            font-weight: bold;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .info-text {
            font-size: 14px;
            color: #333;
        }

        .highlight {
            font-weight: bold;
        }

        a {
            color: #800000;
            text-decoration: none;
            font-weight: bold;
        }

        .submit-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        button {
            background-color: #800000;
            color: #fff;
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #a00000;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Bedding Pack Purchase Information</h2>

        <p>
            To reduce the amount of luggage you need to bring with you at the start of term and avoid paying excess
            luggage charges, the School can supply a complete bedding pack, which, if ordered, will have name tapes sewn
            in and will be delivered directly to your House prior to your arrival at the School.
        </p>

        <p>
            Total price for the pack is <span class="highlight">£95.00</span> to include the sewing of name tapes.
        </p>

        <p>
            The bedding starter pack will fit a standard size single bed (90cm x 190cm), be supplied in a neutral colour
            and will include:
        </p>

        <ul>
            <li>Pillow x2</li>
            <li>Single duvet x1</li>
            <li>Single fitted sheet x1 (90cm x 190cm)</li>
            <li>Single duvet cover x1 (137cm x 203cm)</li>
            <li>Pillow cases x2 (50cm x 76cm)</li>
            <li>Hand towel x1</li>
            <li>Bath towel x1</li>
        </ul>
        <form action="bed_insert.php" method="POST">
            <input type="hidden" name="id" id="id" value="<!-- ID of the existing record -->">

            <div class="question">Do you wish to purchase Bedding Pack for your child? <span
                    style="color: red;">*</span>
            </div>

            <div class="radio-group">
                <label><input <?= (isset($existRecord['purchase']) && $existRecord['purchase'] == 'yes') ? 'checked' : '' ?> type="radio" name="purchase" value="yes"> Yes</label>
                <label><input <?= (isset($existRecord['purchase']) && $existRecord['purchase'] == 'no') ? 'checked' : '' ?>
                        type="radio" name="purchase" value="no"> No</label>
            </div>

            <div class="checkbox-group" id="mainDiv" <?= (isset($existRecord['purchase']) && $existRecord['purchase'] == 'yes') ? '' : 'style="display: none;"' ?>>
                <p class="info-text">
                    If you have any queries relating to School Uniform, Name Tapes or Bedding, please contact us by
                    email <a href="#">School Shop</a> or call 00 44 1527 579679 Ext. 220.
                </p>
                <div style="display:flex;"> 
                <p class="highlight">
                    Additional bedding will need to be purchased locally during the first week of term, as two sets of
                    bedding are required. We can arrange for these to have name tapes sewn in if required. Price on
                    application.
                </p>
                </div>
                <input type="checkbox" id="und" name="understand" value="yes" <?= (isset($existRecord['understand']) && $existRecord['understand'] === 'yes') ? 'checked' : ''; ?>>
                <label>I/We understand that the above can be paid for on arrival at School. Payment can be taken when
                    you
                    visit the School Shop or added to your Lent Term Invoice.<span style="color: red;">*</span></label>
            </div>




            <div class="submit-container">
                <button type="submit">Submit</button>
            </div>
        </form>
        <script>
            const radios = document.querySelectorAll('input[name="purchase"]');
            const divmain = document.getElementById('mainDiv');
            const understad = document.getElementById('und');

            // divmain.style.display = "none";

            radios.forEach(radio => {
                radio.addEventListener("change", function () {
                    if (this.value === "yes") {
                        divmain.style.display = "block";
                        understad.setAttribute("required", "required");
                    } else {
                        divmain.style.display = "none";
                        understad.removeAttribute("required");
                        understad.checked = false;
                    }
                });
            });


        </script>
    </div>

</body>

</html>