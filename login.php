<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the connection file
    require_once 'connection1.php';

    $_SESSION['loggedin'] = true;

// Redirect to the profile page
header('Location: profile.php');


    // Check if username and password are set
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Prepare the SQL statement to fetch user details from the database
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        
        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);

        // Set parameters
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if the user exists and credentials match
        if ($result->num_rows == 1) {
            // User exists, fetch user details
            $user = $result->fetch_assoc();
            
            // Check if the user is a farmer or buyer
            if ($user['role'] == 'farmer') {
                // Farmer login, set session variables and redirect to farmer home page
                $_SESSION["username"] = $username;
                header("Location: home_farmer.php");
                exit();
            } else if ($user['role'] == 'buyer') {
                // Buyer login, set session variables and redirect to buyer home page
                $_SESSION["username"] = $username;
                header("Location: home_buyer.php");
                exit();
            }
        } else {
            // Invalid credentials, redirect back to login page with error message
            $error_message = "Invalid username or password";
        }
    } else {
        // Invalid request, redirect back to login page with error message
        $error_message = "Invalid request";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg'); /* Replace 'background_image.jpg' with your image file path */
            background-size: cover;
            background-position: center;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0); /* Fully transparent background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px); /* Blur the background */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            gap: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <?php if(isset($error_message)) { ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
