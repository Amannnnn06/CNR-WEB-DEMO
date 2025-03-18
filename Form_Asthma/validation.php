<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an errors array
    $errors = [];

    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    if (empty($_POST["asthma"])) {
        $errors[] = "Asthma selection is required.";
    }

    if (empty($_POST["diagnosis_date"])) {
        $errors[] = "Diagnosis date is required.";
    }

    if (empty($_POST["symptoms"]) || strlen($_POST["symptoms"]) < 10) {
        $errors[] = "Symptoms must be at least 10 characters.";
    }

    if (empty($_POST["ongoing"])) {
        $errors[] = "Ongoing selection is required.";
    }

    if (empty($_POST["child_asthma"])) {
        $errors[] = "Child's asthma selection is required.";
    }

    if (empty($_POST["child_diagnosis_date"])) {
        $errors[] = "Child's diagnosis date is required.";
    }

    if (empty($_POST["child_symptoms"]) || strlen($_POST["child_symptoms"]) < 10) {
        $errors[] = "Child symptoms must be at least 10 characters.";
    }

    if (empty($_POST["child_ongoing"])) {
        $errors[] = "Child's ongoing selection is required.";
    }

    if (empty($_POST["consultant_name"]) || strlen($_POST["consultant_name"]) < 3) {
        $errors[] = "Consultant name must be at least 3 characters.";
    }

    if (empty($_POST["contact_details"]) || !preg_match("/^[0-9+ -]{10,15}$/", $_POST["contact_details"])) {
        $errors[] = "Contact details must be between 10-15 characters and contain only numbers, +, or -.";
    }

    // If there are no errors, process the form
    if (empty($errors)) {
        echo "<p style='color:green;'>Form submitted successfully!</p>";
        // Here you can proceed with storing data in the database
    } else {
        echo "<p style='color:red;'>" . implode("<br>", $errors) . "</p>";
    }
}
?>
