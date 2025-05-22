<?php
// Include database connection
include_once 'db_connection.php';

// Function to get list of trains
function getTrains() {
    global $conn;

    // Initialize an empty array to store trains
    $trains = array();

    // Query to select all trains
    $query = "SELECT * FROM Trains";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if query was successful
    if ($result) {
        // Fetch each row from the result set and add it to the $trains array
        while ($row = mysqli_fetch_assoc($result)) {
            $trains[] = $row;
        }
    } else {
        // If query fails, display an error message
        echo "Error retrieving trains: " . mysqli_error($conn);
    }

    // Return the array of trains
    return $trains;
}
?>
