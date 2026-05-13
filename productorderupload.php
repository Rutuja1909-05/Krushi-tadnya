<?php
require_once 'connection1.php';

if (isset($_POST["submit"])) {
    $productname = mysqli_real_escape_string($conn, $_POST["productname"]);
    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $Productprice = mysqli_real_escape_string($conn, $_POST["Productprice"]);

    // FIXED: Swapped variable order to match your SQL columns ($quantity and $Productprice)
    $sql = "INSERT INTO fruitinfo(productname, quantity, Productprice)
            VALUES('$productname', '$quantity', '$Productprice')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Your product uploaded successfully')</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Product | AgriConnect</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1b4332;
            --accent: #52b788;
            --glass: rgba(255, 255, 255, 0.9);
            --dark-glass: rgba(0, 0, 0, 0.5);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            background: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* --- THE NAV BAR (Consistent with other pages) --- */
        .nav-wrapper { position: fixed; top: 15px; left: 50%; transform: translateX(-50%); width: 95%; z-index: 2000; }
        nav { background: var(--glass); backdrop-filter: blur(15px); padding: 10px 25px; border-radius: 100px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        .nav-item { text-decoration: none; color: var(--primary); font-size: 11px; font-weight: 800; display: flex; flex-direction: column; align-items: center; text-transform: uppercase; min-width: 80px; }
        .nav-item img { width: 22px; margin-bottom: 3px; }

        /* --- MARQUEE SECTION --- */
        .marquee-container {
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 10px 0;
            margin-top: 110px; /* Space for Nav */
            font-size: 14px;
            font-weight: 600;
        }

        /* --- MAIN FORM CONTAINER --- */
        #app {
            width: 90%;
            max-width: 500px;
            background: var(--glass);
            backdrop-filter: blur(20px);
            border-radius: 40px;
            padding: 40px;
            margin: 40px 0;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.4);
        }

        h2 {
            color: var(--primary);
            font-weight: 800;
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-group { margin-bottom: 20px; }

        label {
            display: block;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 8px;
            font-size: 12px;
            text-transform: uppercase;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 15px;
            border-radius: 15px;
            border: 1px solid rgba(0,0,0,0.1);
            background: rgba(255,255,255,0.5);
            font-family: inherit;
            font-weight: 600;
            font-size: 16px;
            box-sizing: border-box;
            transition: 0.3s;
        }

        input:focus {
            outline: none;
            border-color: var(--accent);
            background: white;
            box-shadow: 0 0 15px rgba(82, 183, 136, 0.2);
        }

        input[type="submit"] {
            width: 100%;
            padding: 18px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 800;
            font-size: 14px;
            text-transform: uppercase;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        input[type="submit"]:hover {
            background: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(82, 183, 136, 0.3);
        }

        .helper-text {
            text-align: center;
            font-size: 11px;
            color: #666;
            margin-top: 20px;
            line-height: 1.5;
        }
    </style>
</head>
<body>

<div class="nav-wrapper">
    <nav>
        <div style="display:flex; align-items:center;">
            <img src="coollogo_com-128613146.jpeg" height="35" style="margin-right:20px;">
            <a href="home_farmer.php" class="nav-item"><img src="navicons/icons8-home-50.png">Home</a>
            <a href="analysis(1).php" class="nav-item"><img src="navicons/bar-chart.png">Analysis</a>
            <a href="productorderupload.php" class="nav-item"><img src="navicons/add-product.png">Upload</a>
        </div>
        <a href="profile.php" class="nav-item"><img src="profile_farmer.png">Profile</a>
    </nav>
</div>

<div class="marquee-container">
    <marquee>या विभागात शेतकऱ्यांनी उत्पादनाची विक्री करण्यासाठी भरावे लागणारे तपशील समाविष्ट आहेत. Details for selling crops.</marquee>
</div>

<div id="app">
    <h2>Upload Crop</h2>
    
    <form id="farmer-form" action="#" method="POST">
        <div class="form-group">
            <label for="product-name">Crop Name</label>
            <input type="text" id="product-name" name="productname" placeholder="e.g. Wheat, Onion" required>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity (kg)</label>
            <input type="number" id="quantity" name="quantity" placeholder="0.00" required>
        </div>

        <div class="form-group">
            <label for="product-price">Price per kg </label>
            <input type="number" id="product-price" name="Productprice" step="0.01" placeholder="0.00" required>
        </div>

        <input type="submit" name="submit" value="Upload to Marketplace">
    </form>

    <p class="helper-text">
        * Once uploaded, your product will be visible to buyers globally.<br>
        * खात्री करा की माहिती अचूक आहे.
    </p>
</div>

</body>
</html>