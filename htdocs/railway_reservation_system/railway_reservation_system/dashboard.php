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

// Get user's booking history
$query = "SELECT * FROM Tickets WHERE UserID = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $query);

$booking_history = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $booking_history[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Railway Reservation System</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://source.unsplash.com/1600x900/?railway');
            background-size: cover;
            background-position: center;
        }

        .container {
            min-width: 400px;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        h3 {
            margin-top: 30px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #0056b3;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        
        <h3>Booking History</h3>
        <?php if (!empty($booking_history)) : ?>
            <form action="cancel_ticket_process.php" method="POST">
                <ul>
                    <?php foreach ($booking_history as $booking) : ?>
                        <li>
                            <input type="checkbox" name="tickets_to_cancel[]" value="<?php echo $booking['TicketID']; ?>">
                            Train: <?php echo $booking['TrainID']; ?> |
                            Booking Date: <?php echo $booking['BookingDate']; ?> |
                            Fare: <?php echo $booking['Fare']; ?> |
                            Status: <?php echo $booking['Status']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <input type="submit" name="cancel_tickets" value="Cancel Selected Tickets">
            </form>
        <?php else : ?>
            <p>No booking history found.</p>
        <?php endif; ?>

        <a href="book_ticket.php" class="btn">Book Ticket</a>
        <button id="logoutBtn">Logout</button>
    </div>

    <script>
        // JavaScript for logout button
        document.getElementById("logoutBtn").addEventListener("click", function() {
            window.location.href = "logout.php";
        });
    </script>
</body>
</html>
