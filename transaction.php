<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all form fields are filled
    if (isset($_POST["buyer_name"]) && isset($_POST["buyer_address"]) && isset($_POST["buyer_contact"]) && isset($_POST["payment_method"]) && isset($_POST["product_id"]) && isset($_POST["quantity"])) {
        // Include the connection file
        require_once 'connection1.php';

        // Prepare the SQL statement to insert transaction details into the database
        $sql_insert = "INSERT INTO transactions (buyer_name, buyer_address, buyer_contact, payment_method, product_id, quantity) VALUES (?, ?, ?, ?, ?, ?)";
        
        // Prepare and bind parameters for insert statement
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ssssii", $buyer_name, $buyer_address, $buyer_contact, $payment_method, $product_id, $quantity);

        // Set parameters
        $buyer_name = $_POST["buyer_name"];
        $buyer_address = $_POST["buyer_address"];
        $buyer_contact = $_POST["buyer_contact"];
        $payment_method = $_POST["payment_method"];
        $product_id = $_POST["product_id"];
        $quantity = $_POST["quantity"];

        // Execute the insert statement
        if ($stmt_insert->execute()) {
            // Update the quantity in the fruitinfo table
            $sql_update = "UPDATE fruitinfo SET quantity = quantity - ? WHERE F_id = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("ii", $quantity, $product_id);
            if ($stmt_update->execute()) {
                echo "<script>alert('Transaction details saved successfully.')</script>";
            } else {
                echo "<script>alert('Error updating product quantity: " . $conn->error . "')</script>";
            }
            $stmt_update->close();
        } else {
            echo "<script>alert('Error saving transaction details: " . $conn->error . "')</script>";
        }

        // Close the statement and connection
        $stmt_insert->close();
        $conn->close();
    } else {
        echo "<script>alert('Invalid request. Please fill all required fields.')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #0fff0f;
            margin: 0;
            padding: 0;
            background: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            padding: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Transaction Details</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="buyer_name">Buyer Name:</label>
            <input type="text" id="buyer_name" name="buyer_name" required>
            
            <label for="buyer_address">Buyer Address:</label>
            <textarea id="buyer_address" name="buyer_address" required></textarea>
            
            <label for="buyer_contact">Buyer Contact:</label>
            <input type="text" id="buyer_contact" name="buyer_contact" required>
            
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="Cash">Cash</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
            </select>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>
            
            <input type="hidden" name="product_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
