<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
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
        video {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -100;
            transform: translate(-50%, -50%);
        }
        .container {
    text-align: center;
    background-color: rgba(255, 255, 255, 0); /* Fully transparent background */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(10px); /* Blur the background */
}

        h1 {
            margin-bottom: 20px;
            color: #333;
            font-size: 36px; /* Larger font size */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Text shadow for emphasis */
        }
        .button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Button shadow */
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <video autoplay loop muted>
        <source src="background_video.mp4" type="video/mp4">
    </video>
    <div class="container">
        <h1>Welcome to Krushi Tadnya </h1>
        <p>कृषिं विना न जीवन्ति जीवाः सर्वे प्रणश्यति। तस्मात् कृषिं प्रयत्नेन कुर्वीत सुखसंयुतः॥<br>
        "Without agriculture, living beings cannot survive; all perish.<br> Therefore, one should diligently engage in agriculture for a prosperous life"</p>
        <a href="login.php" class="button">Login</a>
        <a href="register.php" class="button">Register</a>
    </div>
</body>
</html>
