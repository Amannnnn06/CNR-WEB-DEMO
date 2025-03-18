<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$database = "cnr-demo"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table with new columns
$sql = "CREATE TABLE IF NOT EXISTS pupil(
    id INT AUTO_INCREMENT PRIMARY KEY,
    pupil_id INT NOT NULL,
    parent_id INT NOT NULL,
    entry_year INT NOT NULL,
    form_data TEXT,
    created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by VARCHAR(50),
    updated_by VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    //"Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

?>