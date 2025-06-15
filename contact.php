<?php
// DB connection details
$server = "localhost";
$username = "root";
$password = "";  
$dbname = "my_portfolio";  
$port = 4306; 
$conn = new mysqli($server, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $conn->real_escape_string($_POST['name']);
    $gmail = $conn->real_escape_string($_POST['email']);  
    $massage = $conn->real_escape_string($_POST['message']);  

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
