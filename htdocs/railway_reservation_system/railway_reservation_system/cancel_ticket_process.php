<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include_once 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if any ticket is selected for cancellation
    if (!empty($_POST['tickets_to_cancel'])) {
        $tickets_to_cancel = $_POST['tickets_to_cancel'];

        // Construct the SQL query to cancel tickets
        $ticketIDs = implode(',', $tickets_to_cancel);
        $query = "UPDATE Tickets SET Status = 'Cancelled' WHERE TicketID IN ($ticketIDs)";

        if (mysqli_query($conn, $query)) {
            // Tickets cancellation successful
            $_SESSION['cancel_success'] = "Selected tickets cancelled successfully!";
            header("Location: dashboard.php");
            exit();
        } else {
            // Tickets cancellation failed
            $_SESSION['cancel_error'] = "Failed to cancel selected tickets. Please try again later.";
            header("Location: dashboard.php");
            exit();
        }
    } else {
        // No ticket selected for cancellation
        $_SESSION['cancel_error'] = "Please select at least one ticket to cancel.";
        header("Location: dashboard.php");
        exit();
    }
} else {
    // Redirect to dashboard if accessed directly
    header("Location: dashboard.php");
    exit();
}
?>
