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
    // Retrieve form data
    $userID = $_SESSION['user_id'];
    $trainID = mysqli_real_escape_string($conn, $_POST['train']);
    $bookingDate = mysqli_real_escape_string($conn, $_POST['date']);

    // Insert ticket into database
    $query = "INSERT INTO Tickets (UserID, TrainID, BookingDate, Fare) VALUES ('$userID', '$trainID', '$bookingDate', '50.00')";

    if (mysqli_query($conn, $query)) {
        // Ticket booking successful
        $_SESSION['booking_success'] = "Ticket booked successfully!";
        header("Location: dashboard.php");
        exit();
    } else {
        // Ticket booking failed
        $_SESSION['booking_error'] = "Failed to book ticket. Please try again later.";
        header("Location: book_ticket.php");
        exit();
    }
} else {
    // Redirect to book ticket page if accessed directly
    header("Location: book_ticket.php");
    exit();
}
?>
