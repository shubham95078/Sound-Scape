<?php
// Start session
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Include database connection
include_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $trainID = $_POST['train'];
    $newDestination = mysqli_real_escape_string($conn, $_POST['destination']);
    $newDepartureTime = $_POST['departure_time'];

    // Validate the format of departure time (assuming HH:MM format)
    if (!preg_match('/^([01]\d|2[0-3]):([0-5]\d)$/', $newDepartureTime)) {
        $_SESSION['modify_error'] = "Invalid format for departure time. Please use HH:MM format.";
        header("Location: admin_dashboard.php");
        exit();
    }

    // Update train details in the database using prepared statement
    $updateQuery = "UPDATE Trains SET Destination=?, DepartureTime=? WHERE TrainID=?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "ssi", $newDestination, $newDepartureTime, $trainID);

    if (mysqli_stmt_execute($stmt)) {
        // Train details updated successfully
        $_SESSION['modify_success'] = "Train details updated successfully!";
    } else {
        // Error updating train details
        $_SESSION['modify_error'] = "Failed to update train details. Please try again later.";
    }

    // Close statement and redirect back to admin dashboard
    mysqli_stmt_close($stmt);
    header("Location: admin_dashboard.php");
    exit();
} else {
    // Redirect to admin dashboard if accessed directly
    header("Location: admin_dashboard.php");
    exit();
}
?>
