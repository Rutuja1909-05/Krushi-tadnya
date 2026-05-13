<?php require_once 'connection1.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labour Mapping | AgriConnect</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1b4332;
            --accent: #52b788;
            --glass: rgba(255, 255, 255, 0.9);
            --dark-glass: rgba(0, 0, 0, 0.7);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            /* Using the same background for visual consistency */
            background: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            padding-top: 120px;
            padding-bottom: 100px;
        }

        /* --- NAV BAR (Identical to Home/Experts Page) --- */
        .nav-wrapper { position: fixed; top: 15px; left: 50%; transform: translateX(-50%); width: 95%; z-index: 2000; }
        nav { background: var(--glass); backdrop-filter: blur(15px); padding: 10px 25px; border-radius: 100px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        .nav-item { text-decoration: none; color: var(--primary); font-size: 11px; font-weight: 800; display: flex; flex-direction: column; align-items: center; text-transform: uppercase; min-width: 80px; }
        .nav-item img { width: 22px; margin-bottom: 3px; }

        .container { max-width: 1000px; margin: 0 auto; padding: 20px; }

        /* --- MODULE HEADER --- */
        .module-header { text-align: center; margin-bottom: 40px; }
        .module-header h1 { font-size: 3rem; margin: 0; }
        .module-header p { opacity: 0.8; font-size: 1.1rem; }

        /* --- MAP BOX (Glassmorphic Style) --- */
        .map-card {
            background: var(--dark-glass);
            backdrop-filter: blur(20px);
            border-radius: 40px;
            padding: 20px;
            border: 1px solid rgba(255,255,255,0.2);
            box-shadow: 0 30px 60px rgba(0,0,0,0.4);
            overflow: hidden;
        }

        .map-wrapper {
            border-radius: 25px;
            overflow: hidden;
            border: 2px solid var(--accent);
        }

        iframe {
            width: 100%;
            height: 550px;
            border: none;
            display: block;
        }

        /* --- MAP LEGEND --- */
        .map-legend {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 25px;
            padding: 15px;
        }

        .legend-item { display: flex; align-items: center; gap: 10px; font-weight: 600; font-size: 14px; }
        .dot { width: 12px; height: 12px; border-radius: 50%; }

        /* --- STICKY FOOTER QUOTE --- */
        .sticky-wisdom {
            position: fixed; bottom: 0; left: 0; width: 100%;
            background: var(--accent); color: var(--primary);
            text-align: center; padding: 15px; font-weight: 800; font-size: 1.3rem;
            z-index: 1000;
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

<div class="container">
    <div class="module-header">
       
    </div>

    <div class="map-card">
        <div class="map-wrapper">
            <iframe 
                src="https://www.google.com/maps/d/u/0/embed?mid=1GNHvZaYSNru_f0RjKkt2bs9zfNP2pJw&ehbc=2E312F" 
                allowfullscreen>
            </iframe>
        </div>

        <div class="map-legend">
            <div class="legend-item">
                <span class="dot" style="background: var(--accent);"></span> Present
            </div>
            <div class="legend-item">
                <span class="dot" style="background: #ff4d4d;"></span> Absent
            </div>
            <div class="legend-item">
                <span class="dot" style="background: #ffd700;"></span> Transit
            </div>
        </div>
    </div>
</div>



</body>
</html>