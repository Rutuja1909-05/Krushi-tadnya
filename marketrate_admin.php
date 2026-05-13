<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #68a73c;
            color: white;
            padding: 8px 0;
            text-align: center;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Page</h1>
    </header>
    <div class="container">
        <form id="adminForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="market_name">Market Name:</label>
            <input type="text" id="market_name" name="market_name" required><br><br>
            <label for="crop_name">Crop Name:</label>
            <input type="text" id="crop_name" name="crop_name" required><br><br>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required><br><br>
            <button type="submit">Save</button>
        </form>
    </div>
    <script>
        function saveDetails() {
            var form = document.getElementById("adminForm");
            var formData = new FormData(form);
            
            fetch(window.location.href, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    return response.text();
                }
                throw new Error('Network response was not ok.');
            })
            .then(data => {
                console.log(data);
                alert("Data saved successfully!");
                // You can add further actions here if needed
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
                alert("Error saving data. Please try again.");
            });
        }
    </script>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $market_name = $_POST['market_name'];
            $crop_name = $_POST['crop_name'];
            $price = $_POST['price'];
            
            // Your database connection code here
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "imagedatabse";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $sql = "INSERT INTO details (name, market_name, crop_name, price)
            VALUES ('$name', '$market_name', '$crop_name', '$price')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    ?>
</body>
</html>
