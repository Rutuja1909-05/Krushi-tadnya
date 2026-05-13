<?php
// Start session for potential login tracking
session_start();

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Verify all required fields are present
    if (isset($_POST["name"], $_POST["email"], $_POST["username"], $_POST["password"], $_POST["role"], $_POST["phone"], $_POST["location"])) {
        
        // Include your database connection file
        require_once 'connection1.php';

        // 2. Prepare SQL (Using 7 placeholders for the 7 fields)
        $sql = "INSERT INTO users (name, email, username, password, role, phone, location) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            // 3. Bind the 7 string parameters
            $stmt->bind_param("sssssss", $name, $email, $username, $password, $role, $phone, $location);

            // 4. Assign values from POST data
            $name     = $_POST["name"];
            $email    = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"]; // Note: In production, use password_hash()
            $role     = $_POST["role"];
            $phone    = $_POST["phone"];
            $location = $_POST["location"];

            // 5. Execute and check for success
            if ($stmt->execute()) {
                echo "<script>
                        alert('Registration successful! Krushi Tadnya AI is now monitoring weather for $location.');
                        window.location.href='login.php';
                      </script>";
            } else {
                // Check for duplicate username or email errors
                if ($conn->errno == 1062) {
                    echo "<script>alert('Error: Username or Email already exists.'); window.history.back();</script>";
                } else {
                    echo "<script>alert('Database Error: " . $conn->error . "'); window.history.back();</script>";
                }
            }

            // 6. Close statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "<script>alert('SQL Preparation Error: " . $conn->error . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Please fill in all the required fields.'); window.history.back();</script>";
    }
} else {
    // If the user tries to access this file directly, redirect them to the registration page
    header("Location: register.php");
    exit();
}
?>