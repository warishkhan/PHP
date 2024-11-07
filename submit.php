<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "mydata";

// Create a connection
$con = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    echo "Connected successfully<br>";
}

// Retrieve and sanitize POST data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$city = $_POST['city'] ?? '';
$country = $_POST['country'] ?? '';
$password = $_POST['password'] ?? '';

// Validate that required fields are not empty
if ($name && $email && $phone && $city && $country && $password) {
    // Prepare the SQL statement
    $stmt = $con->prepare("INSERT INTO clients (name, email, phone, city, country, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $phone, $city, $country, $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "All fields are required!";
}

// Close the connection
$con->close();
?>

