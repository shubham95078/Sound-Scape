<!DOCTYPE html>
<html>
<head>
    <title>Soundscape Login</title>
    <style>
        /* CSS Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            background-image: url("https://source.unsplash.com/2500x1400/?music");
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        
        .container {
            background-color: #fff;
            opacity: 0.85;
            width: 330px;
            padding: 20px;
            border-radius: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .error {
            color: #af4242;
            background-color: #fde8ec;
            padding-top: 5px;
            margin-bottom: 0;
            display: none;
            font-size: small;
            transform: translateY(-20px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="SoundScape.jpg" alt="Soundscape Logo" height="70px" width="140px" />
        </div>
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email Address" id="input1" required>
            <?php
            // Connect to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "soundscape";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $errorMessage = "";

            if (isset($_POST['submit'])) {
                $login = false;
                // Retrieve form data
                $email = $_POST['email'];
                $password = $_POST['password'];
                // Check if the email and password match
                $query = "SELECT * FROM user_details WHERE email = '$email' ";
                $result = $conn->query($query);
                $num = $result->num_rows;
                if ($num == 1) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (password_verify($password, $row['password'])) {
                            echo "Login successful!";
                            $login = true;
                            session_start();
                            $_SESSION['loggedin'] = true;
                            $_SESSION['email'] = $email;
                            $_SESSION['name'] = $row['fullname'];
                            header("Location: spotifyclone.php");
                            exit;
                        } else {
                            echo "<div style='color: #af4242;
                            background-color: #fde8ec;
                            padding-top: 5px;
                            margin-bottom:0;
                            font-size: small;
                            transform: translateY(-20px);'>Incorrect password</div>";
                        }
                    }
                } else {
                    echo "<div style='color: #af4242;
                    background-color: #fde8ec;
                    padding-top: 5px;
                    margin-bottom:0;
                    font-size: small;
                    transform: translateY(-20px);'>This email doesn't exist, please sign up</div>";
                }

                $conn->close();
            }
            ?>
            <p class="error email-error"></p>
            <br>
            <input type="password" name="password" placeholder="Password" id="input2" required>
            <p class="error password-error"></p>
            <br>
            <button type="submit" name="submit" onclick="return validateForm()">Login</button>
        </form>
        <p class="error"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?></p>
    </div>
    <script src="login.js"></script>
</body>
</html>