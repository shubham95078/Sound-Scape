<?php
// Start session
session_start();

// Include database connection
include_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if username or email already exists
    $query = "SELECT * FROM Users WHERE Username='$username' OR Email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Username or email already exists
        $_SESSION['register_error'] = "Username or email already exists.";
        header("Location: register.php");
        exit();
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert new user into database
        $insert_query = "INSERT INTO Users (Username, Password, Email, Role) VALUES ('$username', '$hashed_password', '$email', 'user')";
        if (mysqli_query($conn, $insert_query)) {
            // Registration successful
            $_SESSION['register_success'] = "Registration successful. You can now login.";
            header("Location: login.php");
            exit();
        } else {
            // Registration failed
            $_SESSION['register_error'] = "Registration failed. Please try again later.";
            header("Location: register.php");
            exit();
        }
    }
} else {
    // Redirect to registration page if accessed directly
    header("Location: register.php");
    exit();
}
?>
