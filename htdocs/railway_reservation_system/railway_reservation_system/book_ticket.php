<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ticket - Railway Reservation System</title>
    <!-- Add your CSS styles here -->
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
            max-width: 900px;
            min-width: 700px;
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

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        select,
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Book Ticket</h2>
        <form action="book_ticket_process.php" method="POST">
            <label for="train">Select Train:</label>
            <select id="train" name="train" required>
                <option value="">Select Train</option>
                <!-- PHP code to fetch trains from the database and populate the options -->
                <?php
                // Include database connection
                include_once 'db_connection.php';

                // Query to fetch trains
                $query = "SELECT * FROM Trains";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['TrainID']}'>{$row['TrainName']} - {$row['Source']} to {$row['Destination']}</option>";
                    }
                } else {
                    echo "<option disabled>No trains available</option>";
                }
                ?>
            </select>

            <label for="date">Select Date:</label>
            <input type="date" id="date" name="date" required>

            <!-- Add more input fields for other necessary details (e.g., number of passengers, class, etc.) -->

            <input type="submit" value="Book Ticket">
        </form>
    </div>
</body>
</html>
