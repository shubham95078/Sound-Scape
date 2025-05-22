<?php
$conn = new mysqli("localhost", "root", "", "soundscape");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    $query = "SELECT * FROM user_details WHERE email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Email already exists. Please use a different email.";
        exit();
    }
    $insert_query = "INSERT INTO user_details (fullname, email, password) VALUES ('$fullname', '$email', '$hash')";
        header("location: login.php");
        $conn->query($insert_query);

    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Soundscape Sign Up</title>
    <style>
        /* CSS Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("https://source.unsplash.com/2500x1400/?music");
            background-size: cover;
            background-position: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 20px;
            max-width: 400px;
        }

        .form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form input[type="text"],
        .form input[type="email"],
        .form input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form button:hover {
            background-color: #555;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 150px;
        }

        #clear {
            margin-top: 10px;
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
        <form class="form" method="post">
            <div class="logo">
                <img src="SoundScape.jpg" alt="Soundscape Logo" height="60px" width="110px" />
            </div>
            <h2>Sign Up</h2>
            <input type="text" id="input1" name="fullname" placeholder="Full Name" required />
            <p class="error fullname-error"></p>

            <input type="email" id="input2" name="email" placeholder="Email Address" required />
            <p class="error email-error"></p>
            
            <input type="password" id="input3" name="password" placeholder="Password" required />
            <p class="error password-error"></p>
            
            <input type="password" id="input4" name="confirm_password" placeholder="Confirm Password" required />
            <p class="error cpassword-error"></p>
            
            <button type="submit" name="submit" onclick="return validateForm()">Sign Up</button>
            <button type="reset" id="clear" name="reset" onclick="clearFunc()">Clear form</button>
            
            <p class="success"></p>
            <p style="color: red">Already registered? <a href="login.php">Login</a></p>
        </form>
    </div>
    <script src="signup.js"></script>
</body>

</html>