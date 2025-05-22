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

    // Query to check if user exists with the provided username
    $query = "SELECT * FROM Users WHERE Username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Verify password
        if (password_verify($password, $row['Password'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $row['UserID'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['role'] = $row['Role'];
            // Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        }
    }

    // If username or password is incorrect, redirect to login failure page
    $_SESSION['login_error'] = "Incorrect username or password.";
    header("Location: login.php");
    exit();
} else {
    // Redirect to login page if accessed directly
    header("Location: login.php");
    exit();
}
?>
