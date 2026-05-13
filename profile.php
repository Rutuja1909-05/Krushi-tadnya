<?php
session_start();
require_once('connection1.php');

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect the user to the login page if not logged in
    header('Location: login.php');
    exit;
}

// Fetch and display the profile page
// Fetch the user details using the username stored in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            $name = $user['name'];
            $email = $user['email'];
            $role = $user['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg'); /* Replace 'background_image.jpg' with your image file path */
            background-size: cover;
            background-position: center;
        }

        .profile-container {
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.3); /* Fully transparent background */
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        h1 {
            margin-top: 0;
        }

        img.profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        button {
            background-color: #68a73c;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 0 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4d7b28;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <img src="profile_farmer.png" alt="Profile Picture" class="profile-picture">
        <h1>Welcome, <?php echo $name; ?>!</h1>
        <p>Email: <?php echo $email; ?></p>
        <p>Role: <?php echo $role; ?></p>

        <!-- Buttons -->
        <div>
            <button onclick="window.location.href='productorderupload.php'">Add Product</button>
            <button onclick="window.location.href='update_password.php'">Update Password</button>
        </div>
    </div>
</body>
</html>

<?php
        } else {
            echo "User not found.";
        }
    } else {
        echo "Error fetching user details: " . mysqli_error($conn);
    }
} else {
    echo "Username not set in session.";
}
?>
