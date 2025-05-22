<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Reservation System</title>
    <style>
        /* Embedded CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            background-image: url('photo-1535535112387-56ffe8db21ff.avif'); /* Replace 'railway_background.jpg' with your image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }

        header {
            background-color: rgba(51, 51, 51, 0.8);
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        main {
            padding: 20px;
            text-align: center;
            color: #333;
        }

        section {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        h1, h2 {
            margin-top: 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        footer {
            background-color: rgba(51, 51, 51, 0.8);
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Links */
        a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease;
        }

        a:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Railway Reservation System</h1>
    </header>
    <main>
        <section>
            <h2>Get Started</h2>
            <ul>
                <li><a href="login.php">User Login</a></li>
                <li><a href="register.php">User Registration</a></li>
                <li><a href="admin_login.php">Admin Login</a></li>
                <li><a href="admin_registration.php">Admin Registration</a></li>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Railway Reservation System</p>
    </footer>
</body>
</html>
