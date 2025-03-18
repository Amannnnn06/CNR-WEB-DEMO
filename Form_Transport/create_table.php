<?php
include 'db.php';
$sql = "CREATE TABLE IF NOT EXISTS form_transport(
    id INT AUTO_INCREMENT PRIMARY KEY,
    pupil_id INT NOT NULL,
    form_data TEXT,
    created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //"Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
?>