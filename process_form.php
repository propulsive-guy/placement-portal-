<?php
// Database configuration
$servername = "localhost"; // Change this to your database server
$username = "root"; // Change this to your database username
$password = "pyb231273"; // Change this to your database password
$dbname = "priyanshu"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name =  $_POST['name'] ;
    $email =  $_POST['email'];
    $branch =  $_POST['branch'];
    $contact =  $_POST['contact'];
    $registration_number =  $_POST['registration_number'];
    $cgpa =  $_POST['cgpa'];
    $tenth_percentage =  $_POST['tenth_percentage'];
    $twelfth_percentage =  $_POST['twelfth_percentage'];
    $skillset =  $_POST['skillset'];
    $diploma =  $_POST['diploma'];

    // Insert data into the database
    $sql = "INSERT INTO student_registration (name, email, branch, contact, registration_number, cgpa, tenth_percentage, twelfth_percentage, skillset, diploma)
    VALUES ('$name', '$email', '$branch', '$contact', '$registration_number', '$cgpa', '$tenth_percentage', '$twelfth_percentage', '$skillset', '$diploma')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
