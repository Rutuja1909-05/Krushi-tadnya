<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            background-image: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg');
            background-size: cover;
            background-position: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.3); /* Fully transparent background */
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        input[type="text"] {
            width: 60%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Need Help?</h1>
        <?php
        // Define common questions and their corresponding answers
        $faq = array(
            "How do I upload a product?" => "To upload a product, go to the 'Upload Product' section on the website. Fill in the required fields such as product name, quantity, price, and upload an image of the product. Then, click on the 'Add Product' button to submit.",
            "How do I buy a product?" => "To buy a product, browse through the available products on the website. Click on the 'Buy Now' button of the desired product. You will be redirected to a transaction page where you can fill in your details and complete the purchase.",
            "What payment methods are accepted?" => "We accept various payment methods including cash, credit card, and debit card. You can choose your preferred payment method during the checkout process.",
            "How do I contact customer support?" => "If you have any questions or need assistance, you can contact our customer support team via email at krushi@gmail.com or by phone at +918999370690.",
            "How do I view nearby nurseries?" => "To view nearby nurseries, go to the 'Nursery Locator' section on the website. Select your area and the type of plantlets you are interested in. The website will display a list of nearby nurseries along with their information.",
            "How can I know the daily rate of crops?" => "To know the daily rate of crops, please visit the 'Price Rate' module on our website. There, you can find updated information on crop prices.",
            "Can you suggest YouTube channels for agriculture?" => "Sure! You can check out our YouTube channel for informative content on agriculture. Click <a href='https://www.youtube.com/@user-yj2rw1ib9n'>here</a> to visit our channel.",
            "How to upload product?" => "To upload a product, go to the 'Upload Product' section on the website. Fill in the required fields such as product name, quantity, price, and upload an image of the product. Then, click on the 'Add Product' button to submit.",
            "How to buy product?" => "To buy a product, browse through the available products on the website. Click on the 'Buy Now' button of the desired product. You will be redirected to a transaction page where you can fill in your details and complete the purchase.",
            "How to get infromation about nearby nurseries?" => "To view nearby nurseries, go to the 'Nursery Locator' section on the website. Select your area and the type of plantlets you are interested in. The website will display a list of nearby nurseries along with their information.",
            "suggest youtube channel for agriculture?" => "Sure! You can check out our YouTube channel for informative content on agriculture. Click <a href='https://www.youtube.com/@user-yj2rw1ib9n'>here</a> to visit our channel.",
 
                // Add more questions and answers as needed
        );

        // Check if the user has submitted a query
        if (isset($_GET['query']) && !empty($_GET['query'])) {
            $query = $_GET['query'];
            // Check if the query matches any of the defined questions
            if (array_key_exists($query, $faq)) {
                // Display the corresponding answer
                echo "<h2>Your question: $query</h2>";
                echo "<p>Answer: " . $faq[$query] . "</p>";
            } else {
                // If the query does not match any of the defined questions, display a generic response
                echo "<h2>No answer found for your query.</h2>";
                echo "<p>Please try asking a different question or contact customer support for assistance.</p>";
            }
        } else {
            // If no query is submitted, display a form for users to ask questions
            echo "<h2>How can we assist you?</h2>";
            echo "<form action=\"help.php\" method=\"GET\">";
            echo "<input type=\"text\" name=\"query\" placeholder=\"Ask your question\">";
            echo "<br>";
            echo "<input type=\"submit\" value=\"Submit\">";
            echo "</form>";
        }
        ?>
    </div>
</body>
</html>
