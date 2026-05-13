<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external CSS file -->
    <style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
    background-image: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg'); /* Replace 'background_image.jpg' with your image file path */
            background-size: cover;
            background-position: center;
}

.container {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0); /* Fully transparent background */
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    color: #333333;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #cccccc;
    border-radius: 5px;
}

textarea {
    height: 100px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #45a049;
}



        </style>

</head>
<body>
    <div class="container">
        <h2>Feedback Form</h2>
        <form action="submit_feedback.php" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>
            
            <input type="submit" value="Submit Feedback">
        </form>
    </div>
</body>
</html>
