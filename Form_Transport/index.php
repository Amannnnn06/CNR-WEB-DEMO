<?php
include 'create_table.php';
$sql_check = "SELECT * FROM form_transport limit 1";
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
    <title>School Transport Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-container">
        <p><strong>School transport</strong> is only offered to those students in <strong>Reception and
                upwards</strong>, for those students attending Bromsgrove Pre-Preparatory and Winterfold House, the same
            collection and drop-off points are offered. Students will be dropped off at Bromsgrove Senior School at
            approximately 8:10 am each morning, a shuttle bus will then transfer students to Pre-Prep or Winterfold
            arriving in time for registration. They will be returned to the Senior School in time for the return coaches
            each afternoon.</p>
        <form id="myForm" action="Insert.php" method="POST">
            <div class="checkbox-container">
                <input <?= (isset($existRecord['applicable']) && $existRecord['applicable'] === 'no') ? 'checked' : ''; ?>
                    type="checkbox" name="applicable" id="not-applicable" value="no">
                <label for="not-applicable"><strong>Please tick here if the form is not applicable</strong></label>
            </div>
            <div id="maindiv">

                <p>My child will use the Transport Scheme.</p>
                <p>Please select frequency of use.</p>

                <div class="note">
                    <p>Please note: Minimum usage is 5 journeys per week, per student.</p>
                </div>
                <div class="transportTable">
                    <table class="transport-table" id="TransportTable">
                        <thead>
                            <tr>
                                <th>Daily requirement:</th>
                                <th>AM</th>
                                <th>PM</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Monday</td>
                                <td><input type="checkbox" id="monday-am" name="transport[]" value="mondayAM"
                                        <?= (!empty($existRecord['transport']) && in_array('mondayAM', $existRecord['transport'])) ? 'checked' : ''; ?>></td>
                                <td><input type="checkbox" id="monday-pm" name="transport[]" value="mondayPM"
                                        <?= (!empty($existRecord['transport']) && in_array('mondayPM', $existRecord['transport'])) ? 'checked' : ''; ?>></td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td><input type="checkbox" id="tuesday-am" name="transport[]" value="tuesdayAM"
                                        <?= (!empty($existRecord['transport']) && in_array('tuesdayAM', $existRecord['transport'])) ? 'checked' : ''; ?>></td>
                                <td><input type="checkbox" id="tuesday-pm" name="transport[]" value="tuesdayPM"
                                        <?= (!empty($existRecord['transport']) && in_array('tuesdayPM', $existRecord['transport'])) ? 'checked' : ''; ?>></td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td><input type="checkbox" id="wednesday-am" name="transport[]" value="wednesdayAM"
                                        <?= (!empty($existRecord['transport']) && in_array('wednesdayAM', $existRecord['transport'])) ? 'checked' : ''; ?>></td>
                                <td><input type="checkbox" id="wednesday-pm" name="transport[]" value="wednesdayPM"
                                        <?= (!empty($existRecord['transport']) && in_array('wednesdayPM', $existRecord['transport'])) ? 'checked' : ''; ?>></td>
                            </tr>
                            <tr>
                                <td>Thursday</td>
                                <td><input type="checkbox" id="thursday-am" name="transport[]" value="thursdayAM"
                                        <?= (!empty($existRecord['transport']) && in_array('thursdayAM', $existRecord['transport'])) ? 'checked' : ''; ?>></td>
                                <td><input type="checkbox" id="thursday-pm" name="transport[]" value="thursdayPM"
                                        <?= (!empty($existRecord['transport']) && in_array('thursdayPM', $existRecord['transport'])) ? 'checked' : ''; ?>></td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td><input type="checkbox" id="friday-am" name="transport[]" value="fridayAM"
                                        <?= (!empty($existRecord['transport']) && in_array('fridayAM', $existRecord['transport'])) ? 'checked' : ''; ?>></td>
                                <td><input type="checkbox" id="friday-pm" name="transport[]" value="fridayPM"
                                        <?= (!empty($existRecord['transport']) && in_array('fridayPM', $existRecord['transport'])) ? 'checked' : ''; ?>></td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="error-box" style="color: red;"></div>
                </div>

                <div class="route-container" id="formTemp">
                    <h2>Please select route:</h2>
                    <p class="note"><strong>Please note:</strong> Routes are subject to change depending on demand.</p>

                    <div class="route-selection">
                        <input <?= (!empty($existRecord['route-selection']) && $existRecord['route-selection'] === 'Halesowen') ? 'checked' : ''; ?> type="radio"
                            name="route-selection" value="Halesowen" id="halesowen">
                        <label for="halesowen-edgbaston">Halesowen / Edgbaston</label>
                    </div>
                    <div class="route-table-container" id="halesowenDiv" <?= (!empty($existRecord['route-selection']) && $existRecord['route-selection'] === 'Halesowen') ? '' : 'style="display: none;"' ?>>
                        <div class="route-table-header">
                            <div class="route-col">Route</div>
                            <div class="pickup-col">Morning Pick Up Time</div>
                            <div class="dropoff-col">Evening Drop Off time</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'farquhar') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" value="farquhar">
                                <label for="farquhar">Farquhar Road/Farquhar Road East</label>
                            </div>
                            <div class="pickup-col">07.00 hrs</div>
                            <div class="dropoff-col">18.15 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'blue-coat') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="blue-coat" value="blue-coat">
                                <label for="blue-coat">Blue Coat School, Somerset Road, Edgbaston</label>
                            </div>
                            <div class="pickup-col">07.08 hrs</div>
                            <div class="dropoff-col">18.20 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'court-oak') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="court-oak" value="court-oak">
                                <label for="court-oak">Bus stop by Court Oak Pub</label>
                            </div>
                            <div class="pickup-col">07.14 hrs</div>
                            <div class="dropoff-col">18.30 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'quinton') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="quinton" value="quinton">
                                <label for="quinton">Quinton Methodist Church</label>
                            </div>
                            <div class="pickup-col">07.25 hrs</div>
                            <div class="dropoff-col">18.40 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'royal-oak') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="royal-oak" value="royal-oak">
                                <label for="royal-oak">The Royal Oak, Manor Lane</label>
                            </div>
                            <div class="pickup-col">07.30 hrs</div>
                            <div class="dropoff-col">18.45 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'south-car-park') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="south-car-park" value="south-car-park">
                                <label for="south-car-park">South Car Park, Bromsgrove School</label>
                            </div>
                            <div class="pickup-col">08.05 hrs</div>
                            <div class="dropoff-col">17.40 hrs</div>
                        </div>
                    </div>
                    <!-- moseley -->
                    <div class="route-selection">
                        <input <?= (!empty($existRecord['route-selection']) && $existRecord['route-selection'] === 'Moseley') ? 'checked' : ''; ?> type="radio"
                            name="route-selection" value="Moseley" id="moseley">
                        <label> Moseley</label>
                    </div>
                    <div class="route-table-container" id="moseleyDiv" <?= (!empty($existRecord['route-selection']) && $existRecord['route-selection'] === 'Moseley') ? '' : 'style="display: none;"' ?>>
                        <div class="route-table-header">
                            <div class="route-col">Route</div>
                            <div class="pickup-col">Morning Pick Up Time</div>
                            <div class="dropoff-col">Evening Drop Off Time</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'Alcester') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="Alcester" value="Alcester">
                                <label for="Alcester">The Village Pub, 179 Alcester Road</label>
                            </div>
                            <div class="pickup-col">07.00 hrs</div>
                            <div class="dropoff-col">18.15 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'Bristol') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="Bristol" value="Bristol">
                                <label for="Bristol">Bristol Road</label>
                            </div>
                            <div class="pickup-col">07.08 hrs</div>
                            <div class="dropoff-col">18.20 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'westhill') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="westhill" value="westhill">
                                <label for="westhill">Westhill Road</label>
                            </div>
                            <div class="pickup-col">07.14 hrs</div>
                            <div class="dropoff-col">18.30 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'south-park') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="south-park" value="south-park">
                                <label for="south-park">South Car Park, Bromsgrove School</label>
                            </div>
                            <div class="pickup-col">07.25 hrs</div>
                            <div class="dropoff-col">18.40 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'robin-hood') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="robin-hood" value="robin-hood">
                                <label for="robin-hood">Robin Hood Crescent, Hall Green</label>
                            </div>
                            <div class="pickup-col">07.30 hrs</div>
                            <div class="dropoff-col">18.45 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'cobham') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="cobham" value="cobham">
                                <label for="cobham">Cobham, Conway Rd, Prep School</label>
                            </div>
                            <div class="pickup-col">08.05 hrs</div>
                            <div class="dropoff-col">17.40 hrs</div>
                        </div>
                    </div>

                    <!-- Solihull  -->
                    <div class="route-selection">
                        <input <?= (!empty($existRecord['route-selection']) && $existRecord['route-selection'] === 'Solihull') ? 'checked' : ''; ?> type="radio"
                            name="route-selection" value="Solihull" id="solihull">
                        <label> Solihull</label>
                    </div>
                    <div class="route-table-container" id="solihullDiv" <?= (!empty($existRecord['route-selection']) && $existRecord['route-selection'] === 'Solihull') ? '' : 'style="display: none;"' ?>>
                        <div class="route-table-header">
                            <div class="route-col">Route</div>
                            <div class="pickup-col">Morning Pick Up Time</div>
                            <div class="dropoff-col">Evening Drop Off Time</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'dove') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="dove" value="dove">
                                <label for="dove">Dove House Parade</label>
                            </div>
                            <div class="pickup-col">07.00 hrs</div>
                            <div class="dropoff-col">18.15 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'SolihullStop') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="SolihullStop" value="SolihullStop">
                                <label for="SolihullStop">Solihull School Bus Stop</label>
                            </div>
                            <div class="pickup-col">07.08 hrs</div>
                            <div class="dropoff-col">18.20 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'warwick') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="warwick" value="warwick">
                                <label for="warwick">Warwick Road / Hampton Lane</label>
                            </div>
                            <div class="pickup-col">07.14 hrs</div>
                            <div class="dropoff-col">18.30 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'wilson') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="wilson" value="wilson">
                                <label for="wilson">Wilson Arms Bus Stop, Warwick Rd, Knowle</label>
                            </div>
                            <div class="pickup-col">07.25 hrs</div>
                            <div class="dropoff-col">18.40 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'grange') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="grange" value="grange">
                                <label for="grange">Grange Road opp Sainsbury's Petrol Station AM</label>
                            </div>
                            <div class="pickup-col">07.30 hrs</div>
                            <div class="dropoff-col">18.45 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'dorridge') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="dorridge" value="dorridge">
                                <label for="dorridge">Dorridge Train Station PM</label>
                            </div>
                            <div class="pickup-col">08.05 hrs</div>
                            <div class="dropoff-col">17.40 hrs</div>
                        </div>
                    </div>

                    <!-- Droitwich -->
                    <div class="route-selection">
                        <input <?= (!empty($existRecord['route-selection']) && $existRecord['route-selection'] === 'Droitwich') ? 'checked' : ''; ?> type="radio"
                            name="route-selection" value="Droitwich" id="droitwich">
                        <label>Droitwich </label>
                    </div>
                    <div class="route-table-container" id="droitwichDiv" <?= (!empty($existRecord['route-selection']) && $existRecord['route-selection'] === 'Droitwich') ? '' : 'style="display: none;"' ?>>
                        <div class="route-table-header">
                            <div class="route-col">Route</div>
                            <div class="pickup-col">Morning Pick Up Time</div>
                            <div class="dropoff-col">Evening Drop Off Time</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'copcut') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="copcut" value="copcut">
                                <label for="copcut">Copcut Elm</label>
                            </div>
                            <div class="pickup-col">07.00 hrs</div>
                            <div class="dropoff-col">18.15 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'woodland') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="woodland" value="woodland">
                                <label for="woodland">Woodland Way / Pulley Lane</label>
                            </div>
                            <div class="pickup-col">07.08 hrs</div>
                            <div class="dropoff-col">18.20 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'shernal') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="shernal" value="shernal">
                                <label for="shernal">Shernal Green</label>
                            </div>
                            <div class="pickup-col">07.14 hrs</div>
                            <div class="dropoff-col">18.30 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'shaw') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="shaw" value="shaw">
                                <label for="shaw">Shaw Lane, Stoke Prior</label>
                            </div>
                            <div class="pickup-col">07.25 hrs</div>
                            <div class="dropoff-col">18.40 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'newland') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="newland" value="newland">
                                <label for="newland">Newland Lane</label>
                            </div>
                            <div class="pickup-col">07.30 hrs</div>
                            <div class="dropoff-col">18.45 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'lyttleton') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="lyttleton" value="lyttleton">
                                <label for="lyttleton">Lyttleton Road</label>
                            </div>
                            <div class="pickup-col">08.05 hrs</div>
                            <div class="dropoff-col">17.40 hrs</div>
                        </div>
                    </div>

                    <!--  Kidderminster-->
                    <div class="route-selection">
                        <input <?= (!empty($existRecord['route-selection']) && $existRecord['route-selection'] === 'Kidderminster') ? 'checked' : ''; ?> type="radio"
                            name="route-selection" value="Kidderminster" id="kidderminster">
                        <label> Kidderminster</label>
                    </div>
                    <div class="route-table-container" id="kidderminsterDiv" <?= (!empty($existRecord['route-selection']) && $existRecord['route-selection'] === 'Kidderminster') ? '' : 'style="display: none;"' ?>>
                        <div class="route-table-header">
                            <div class="route-col">Route</div>
                            <div class="pickup-col">Morning Pick Up Time</div>
                            <div class="dropoff-col">Evening Drop Off Time</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'A449') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="A449" value="A449">
                                <label for="A449">A449 Esso (Hartlebury) Garage</label>
                            </div>
                            <div class="pickup-col">07.00 hrs</div>
                            <div class="dropoff-col">18.15 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'Train-station') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="Train-station" value="Train-station">
                                <label for="Train-station">Kidderminster Train Station</label>
                            </div>
                            <div class="pickup-col">07.08 hrs</div>
                            <div class="dropoff-col">18.20 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'harvington') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="harvington" value="harvington">
                                <label for="harvington">The Dog Inn Harvington</label>
                            </div>
                            <div class="pickup-col">07.14 hrs</div>
                            <div class="dropoff-col">18.30 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'winterfold') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="winterfold" value="winterfold">
                                <label for="winterfold">Winterfold School</label>
                            </div>
                            <div class="pickup-col">07.25 hrs</div>
                            <div class="dropoff-col">18.40 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'routh') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="routh" value="routh">
                                <label for="routh">Routh Hall, Bromsgrove School</label>
                            </div>
                            <div class="pickup-col">07.30 hrs</div>
                            <div class="dropoff-col">18.45 hrs</div>
                        </div>

                        <div class="route-row">
                            <div class="route-col">
                                <input <?= (!empty($existRecord['pickup-point']) && $existRecord['pickup-point'] === 'cherry') ? 'checked' : ''; ?> type="radio"
                                    name="pickup-point" id="cherry" value="cherry">
                                <label for="cherry">Cherry Lane</label>
                            </div>
                            <div class="pickup-col">08.05 hrs</div>
                            <div class="dropoff-col">17.40 hrs</div>
                        </div>
                    </div>

                </div>
                <div>
                    <p>Our Transport Department will contact all parents in August to confirm the booking, collection
                        point
                        and timings. A copy of the Bromsgrove School Transport Rules, which all students are expected to
                        comply to, will accompany the confirmation.</p>
                </div>
                <div class="checkbox-container">
                    <input <?= (isset($existRecord['understand']) && $existRecord['understand'] === 'yes') ? 'checked' : ''; ?> type="checkbox" id="understand" value="yes" name="understand">
                    <label>I understand that the School's Transport Scheme is invoiced in arrears and that if I wish to
                        withdraw my child from the scheme I must give one half-term's written notice directly to the
                        Transport Manager. <span style="color:red;">*required</span></label>
                </div>
                <div class="checkbox-container">
                    <input <?= (isset($existRecord['confirm']) && $existRecord['confirm'] === 'yes') ? 'checked' : ''; ?> type="checkbox" id="confirm" value="yes" name="confirm">
                    <label>I confirm that my child will use the Bromsgrove School Transport Scheme and that we have
                        noted
                        the General Rules of the scheme.<span style="color:red;">*required</span></label>
                </div>
            </div>

            <div class="Sub-1">
                <input type="submit">
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>