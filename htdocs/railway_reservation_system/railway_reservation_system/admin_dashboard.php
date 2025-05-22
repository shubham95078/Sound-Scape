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

// Include function to retrieve train details
include_once 'train_functions.php';

// Get list of trains
$trains = getTrains();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Railway Reservation System</title>
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
            min-width: 700px;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        select, input[type="text"], input[type="time"], input[type="submit"] {
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

        a {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #007bff;
            margin-top: 20px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, Admin!</h2>
        <h3>Modify Train Details</h3>
        <form action="modify_train_process.php" method="POST">
            <label for="train">Select Train:</label>
            <select name="train" id="train">
                <?php foreach ($trains as $train) : ?>
                    <option value="<?php echo $train['TrainID']; ?>"><?php echo $train['TrainName']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="destination">New Destination:</label>
            <input type="text" name="destination" id="destination" required>
            <label for="departure_time">New Departure Time:</label>
            <input type="time" name="departure_time" id="departure_time" required>
            <input type="submit" name="submit" value="Modify Train">
        </form>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
