<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "students_data";

$data = mysqli_connect($host, $user, $password, $db);
require_once('register.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    // Validate form data
    $errors = [];
    if (empty($full_name)) {
        $errors[] = "Full Name is required";
    }
    if (empty($email)) {
        $errors[] = "Email Address is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email Address";
    }
    if (empty($gender)) {
        $errors[] = "Gender is required";
    }

    // If there are no errors, insert data into the database
    if (empty($errors)) {
        $query = "INSERT INTO students(full_name, email, gender) VALUES ('$full_name', '$email', '$gender')";
        if (mysqli_query($data, $query)) {
            echo "Registration successful!";
        } else {
            echo "Error: " . mysqli_error($data);
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>