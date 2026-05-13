<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        /* Additional CSS styles for product cards */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            background-image: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg'); /* Replace 'background_image.jpg' with your image file path */
            background-size: cover;
            background-position: center;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        #product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            width: 300px;
            background-color: rgba(255, 255, 255, 0.3); /* Fully transparent background */
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-card img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .product-card h3 {
            margin: 0;
            color: #333;
            font-size: 22px;
            text-align: center;
            margin-bottom: 10px;
        }
        .product-card p {
            margin: 0;
            color: #666;
            font-size: 16px;
            text-align: center;
        }
        .buy-now-btn {
            display: block;
            text-align: center;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            margin-top: 15px;
        }
        .buy-now-btn:hover {
            background-color: #45a049;
        }
        .no-product-available {
            text-align: center;
            color: #666;
            font-size: 18px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <h1>Explore Our Products</h1>
    <div id="product-list">
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
                echo "<div class='product-card'>";
                // Check if the 'image' key exists
                if (isset($row["image"])) {
                    echo "<img src='product_images/{$row["image"]}' alt='{$row["productname"]}'>";
                }
                echo "<h3>" . $row["productname"]. "</h3>";
                if ($row["quantity"] <= 0) {
                    echo "<p class='no-product-available'>No longer available</p>";
                } else {
                    echo "<p>Quantity: " . $row["quantity"]. " kg</p>";
                    echo "<p>Price: $" . $row["Productprice"]. "</p>";
                    if (isset($row["F_id"])) {
                        echo "<a href='transaction.php?id={$row["F_id"]}' class='buy-now-btn'>Buy Now</a>";
                    } else {
                        echo "<a href='#' class='buy-now-btn'>Buy Now</a>";
                    }
                }
                echo "</div>";
            }
            
        } else {
            echo "<p>No products available</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
