<?php
session_start();
require_once('connection1.php');

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect the user to the login page if not logged in
    header('Location: login.php');
    exit;
}

// Define variables and initialize with empty values
$current_password = $new_password = $confirm_password = '';
$current_password_err = $new_password_err = $confirm_password_err = '';

// Processing form data when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate current password
    if (empty(trim($_POST['current_password']))) {
        $current_password_err = 'Please enter your current password.';
    } else {
        $current_password = trim($_POST['current_password']);
    }

    // Validate new password
    if (empty(trim($_POST['new_password']))) {
        $new_password_err = 'Please enter the new password.';
    } elseif (strlen(trim($_POST['new_password'])) < 6) {
        $new_password_err = 'Password must have at least 6 characters.';
    } else {
        $new_password = trim($_POST['new_password']);
    }

    // Validate confirm password
    if (empty(trim($_POST['confirm_password']))) {
        $confirm_password_err = 'Please confirm the password.';
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = 'Password did not match.';
        }
    }

    // Check input errors before updating the database
    if (empty($current_password_err) && empty($new_password_err) && empty($confirm_password_err)) {
        // Prepare a select statement
        $sql = 'SELECT password FROM users WHERE username = ?';

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 's', $param_username);

            // Set parameters
            $param_username = $_SESSION['username'];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($current_password, $hashed_password)) {
                            // Password is correct, update password
                            $sql = 'UPDATE users SET password = ? WHERE username = ?';

                            if ($stmt = mysqli_prepare($conn, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, 'ss', $param_password, $param_username);

                                // Set parameters
                                $param_password = password_hash($new_password, PASSWORD_DEFAULT);

                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Password updated successfully, destroy the session and redirect to login page
                                    session_destroy();
                                    header('Location: login.php');
                                    exit;
                                } else {
                                    echo 'Oops! Something went wrong. Please try again later.';
                                }

                                // Close statement
                                mysqli_stmt_close($stmt);
                            }
                        } else {
                            // Display an error message if current password is not valid
                            $current_password_err = 'The password you entered is not valid.';
                        }
                    }
                } else {
                    // Redirect user to login page if username doesn't exist
                    header('Location: login.php');
                    exit;
                }
            } else {
                echo 'Oops! Something went wrong. Please try again later.';
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
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
        }

        .password-form {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        h2 {
            margin-top: 0;
        }

        input {
            margin: 10px 0;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .help-block {
            color: red;
        }

        button {
            background-color: #68a73c;
            color: white;
            border: none;
            padding: 10px 20px;
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
    <div class="password-form">
        <h2>Update Password</h2>
        <p>Please fill out this form to update your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group <?php echo (!empty($current_password_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="current_password" placeholder="Current Password" value="<?php echo $current_password; ?>">
                <span class="help-block"><?php echo $current_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="new_password" placeholder="New Password" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="confirm_password" placeholder="Confirm New Password" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <button type="submit">Update Password</button>
            </div>
        </form>
    </div>
</body>
</html>
