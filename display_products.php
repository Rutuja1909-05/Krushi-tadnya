<?php
// Include the connection file
require_once 'connection1.php';

// Fetch products from the database
$sql = "SELECT * FROM fruitinfo";
$result = $conn->query($sql);

// Check if there are any products
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Product Name: " . $row["productname"]. " - Quantity: " . $row["quantity"]. " kg - Price: $" . $row["Productprice"]. "<br>";
    }
} else {
    echo "No products available";
}

// Close the database connection
$conn->close();
?>
