<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Market Map | AgriPro</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #1b4332;
            --accent: #52b788;
            --glass-nav: rgba(255, 255, 255, 0.9);
            --dark-glass: rgba(0, 0, 0, 0.6);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            background: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            overflow: hidden; 
            color: white;
        }

        /* --- NAV BAR (Same as Home) --- */
        .nav-wrapper { position: fixed; top: 15px; left: 50%; transform: translateX(-50%); width: 95%; z-index: 2000; }
        nav { background: var(--glass-nav); backdrop-filter: blur(15px); padding: 10px 25px; border-radius: 100px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        .nav-item { text-decoration: none; color: var(--primary); font-size: 11px; font-weight: 800; display: flex; flex-direction: column; align-items: center; text-transform: uppercase; min-width: 80px; }
        .nav-item img { width: 22px; margin-bottom: 3px; }

        /* --- DASHBOARD LAYOUT --- */
        .dashboard-container {
            display: flex;
            height: calc(100vh - 160px);
            margin-top: 110px;
            padding: 0 40px;
            gap: 25px;
        }

        /* --- SIDEBAR --- */
        #leftContainer {
            width: 300px;
            background: var(--dark-glass);
            backdrop-filter: blur(20px);
            border-radius: 35px;
            padding: 30px 20px;
            border: 1px solid rgba(255,255,255,0.2);
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        h2 { font-weight: 800; text-align: center; margin-bottom: 15px; font-size: 1.1rem; }

        .crop-button {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 15px 20px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 15px;
            transition: 0.3s;
            text-align: left;
        }

        .crop-button:hover { background: var(--accent); color: var(--primary); }
        .crop-button.active { background: var(--accent); color: var(--primary); box-shadow: 0 0 15px var(--accent); }

        /* --- MAP VIEW AREA --- */
        #rightContainer {
            flex: 1;
            background: var(--dark-glass);
            backdrop-filter: blur(10px);
            border-radius: 35px;
            border: 1px solid rgba(255,255,255,0.2);
            overflow: hidden;
            position: relative;
        }

        #mapPlaceholder {
            position: absolute;
            top: 50%; left: 50%; transform: translate(-50%, -50%);
            text-align: center; opacity: 0.6;
        }

        iframe { width: 100%; height: 100%; border: none; }
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

<div class="dashboard-container">
    <div id="leftContainer">
        <h2>CROP REGIONS</h2>
        <button class="crop-button" onclick="loadMap('https://www.google.com/maps/d/u/0/embed?mid=1kjwO0LKZagWaeQbfA4KVwqP_PqVKPCs&ehbc=2E312F%27&ll=19.212951253235193%2C73.89249053462743&z=12', this)">Onion</button>
        <button class="crop-button" onclick="loadMap('https://www.google.com/maps/d/u/0/embed?mid=1GAMBBGnCdvDY3h3Ilfe0u3vWt6huHQI&ehbc=2E312F', this)">Bijli</button>
       
    </div>

    <div id="rightContainer">
        <div id="mapPlaceholder">
            <p>Select a crop to view the map</p>
        </div>
        <div id="mapView" style="width:100%; height:100%;"></div>
    </div>
</div>

<script>
    function loadMap(originalLink, btn) {
        // 1. Hide placeholder
        document.getElementById('mapPlaceholder').style.display = 'none';

        // 2. Clear previous map
        const view = document.getElementById('mapView');
        view.innerHTML = "";

        // 3. Highlight button
        document.querySelectorAll('.crop-button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        // 4. FIX: Force Google Maps into EMBED mode
        // If your link is a share link, it needs /embed or &output=embed
        let finalLink = originalLink;
        if (!finalLink.includes("embed")) {
            finalLink = finalLink.split('?')[0] + "?output=embed";
        }

        // 5. Create the Iframe
        const ifrm = document.createElement("iframe");
        ifrm.setAttribute("src", finalLink);
        ifrm.style.width = "100%";
        ifrm.style.height = "100%";
        view.appendChild(ifrm);
    }
</script>

</body>
</html>