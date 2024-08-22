<?php

$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$gender = $_POST['gender'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$number = $_POST['number'] ?? '';


$conn = new mysqli('localhost', 'root', '', 'test');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");


if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}


$stmt->bind_param("ssssss", $firstName, $lastName, $gender, $email, $password, $number);


if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
