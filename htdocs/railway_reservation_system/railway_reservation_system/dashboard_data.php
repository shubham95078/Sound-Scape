<?php
// Function to retrieve user's booking history from the database
function getUserBookingHistory($userID) {
    global $conn;
    $booking_history = array();

    // Query to get user's booking history
    $query = "SELECT Trains.TrainName, Tickets.BookingDate, Tickets.Fare, Tickets.Status 
              FROM Tickets 
              INNER JOIN Trains ON Tickets.TrainID = Trains.TrainID
              WHERE Tickets.UserID = $userID";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $booking_history[] = $row;
        }
    }

    return $booking_history;
}
?>
