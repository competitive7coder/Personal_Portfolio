<?php
// DB connection details
$server = "localhost";
$username = "root";
$password = "";  // Usually empty for XAMPP unless you set a password
$dbname = "my_portfolio";  // Your database name
$port = 4306;  // Your MySQL port from my.cnf, default is usually 3306 but you said 4306

// Create connection
$conn = new mysqli($server, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $name = $conn->real_escape_string($_POST['name']);
    $gmail = $conn->real_escape_string($_POST['email']);  // Your form uses 'email' field
    $massage = $conn->real_escape_string($_POST['message']);  // Your form uses 'message' field

    // Insert query (table 'user_details' with columns: name, gmail, massage)
    $sql = "INSERT INTO user_details (name, gmail, massage) VALUES ('$name', '$gmail', '$massage')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you for contacting us! Your message has been saved.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Please submit the form first.";
}

$conn->close();
?>
