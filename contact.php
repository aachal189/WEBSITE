<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";  // Assuming your server is localhost
$username = "root";  // Default username for XAMPP
$password = "";  // Default password for XAMPP is empty
$dbname = "newname";  // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $phoneNumber = $_POST['PhoneNumber'];
    $message = $_POST['Message'];

    // Check if all required fields are filled
    if (empty($firstName) || empty($lastName) || empty($email) || empty($message)) {
        echo "Please fill in all required fields.";
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO form_submissions (first_name, last_name, email, phone_number, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstName, $lastName, $email, $phoneNumber, $message);  // 'sssss' denotes five strings

        // Execute the query
        if ($stmt->execute()) {
            echo "Form submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>
