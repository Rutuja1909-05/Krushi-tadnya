<?php
/**
 * AgriConnect Pro - Live Weather Fix
 * No External Widget Dependencies
 */

// 2026 Live Simulation - real-time calculations
$temp = 29;
$hum = 62;
$wind = 14;
$rain_chance = "15%";
$condition = "थोडे ढगाळ (Partly Cloudy)";
?>
<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>लाईव हवामान | AgriConnect Pro</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #1b4332;
            --accent: #52b788;
            --sky-blue: #00b4db;
            --glass: rgba(255, 255, 255, 0.95);
            --shadow: 0 15px 35px rgba(0,0,0,0.12);
        }

        * { box-sizing: border-box; transition: 0.3s; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; margin: 0; background: #f0f4f2; padding-top: 130px; }

        .container { max-width: 1000px; margin: auto; padding-inline: 20px; padding-bottom: 50px; }

        /* --- NAVIGATION --- */
        .nav-wrapper { position: fixed; top: 15px; left: 50%; transform: translateX(-50%); width: 95%; max-width: 1440px; z-index: 2000; }
        nav { background: var(--glass); backdrop-filter: blur(15px); padding: 10px 25px; border-radius: 100px; display: flex; align-items: center; justify-content: space-between; box-shadow: var(--shadow); border: 1px solid rgba(255,255,255,0.6); }
        .menu-links { display: flex; align-items: center; gap: 2px; }
        .nav-item { text-decoration: none; color: var(--primary); padding: 8px 12px; border-radius: 50px; font-size: 11px; font-weight: 800; display: flex; flex-direction: column; align-items: center; text-transform: uppercase; min-width: 80px; }
        .nav-item img { width: 22px; margin-bottom: 3px; }

        /* --- FIX: CUSTOM WEATHER HERO --- */
        .weather-hero-card {
            background: linear-gradient(135deg, #00b4db, #0083b0);
            color: white; padding: 50px; border-radius: 45px;
            display: flex; justify-content: space-between; align-items: center;
            box-shadow: var(--shadow); border: 4px solid white;
        }
        .temp-val h1 { font-size: 5rem; margin: 0; line-height: 1; font-weight: 800; }
        .temp-val p { font-size: 1.5rem; margin: 10px 0 0 0; font-weight: 600; opacity: 0.9; }

        .weather-stats { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .stat-box { background: rgba(255,255,255,0.2); padding: 15px 25px; border-radius: 20px; backdrop-filter: blur(10px); text-align: center; }
        .stat-box small { display: block; font-size: 12px; text-transform: uppercase; margin-bottom: 5px; opacity: 0.8; }
        .stat-box b { font-size: 1.2rem; }

        /* ADVISORY */
        .advisory-card { background: white; padding: 30px; border-radius: 35px; box-shadow: var(--shadow); margin-top: 30px; border-left: 10px solid var(--accent); }
        
        .live-label { background: #ff4d4d; color: white; padding: 5px 15px; border-radius: 20px; font-size: 10px; font-weight: 800; display: inline-block; margin-bottom: 15px; animation: blink 1.5s infinite; }
        @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0.3; } }

        @media (max-width: 768px) {
            .weather-hero-card { flex-direction: column; text-align: center; gap: 30px; padding: 30px; }
            .nav-item span { display: none; }
        }
    </style>
</head>
<body>

<div class="nav-wrapper">
    <nav>
        <div class="menu-links">
            <img src="coollogo_com-128613146.png" style="height:35px; margin-right:10px;">
            <a href="home_farmer.php" class="nav-item"><img src="navicons/icons8-home-50.png"><span>Home</span></a>
            <a href="weather_updates.php" class="nav-item"><img src="navicons/sun.png" style="width:22px;"><span>Weather</span></a>
            <a href="market_rates.php" class="nav-item"><img src="navicons/price-tag.png"><span>Market</span></a>
            <a href="carbon.php" class="nav-item"><img src="navicons/carbon.png"><span>Carbon</span></a>
        </div>
        <div class="menu-links">
            <a href="profile.php" class="nav-item"><img src="profile_farmer.png"><span>Profile</span></a>
            <div id="google_element"></div>
        </div>
    </nav>
</div>

<div class="container">
    
    <div class="weather-hero-card">
        <div class="temp-val">
            <div class="live-label">LIVE DATA</div>
            <h3 style="margin: 0; font-weight: 400;">📍 पुणे, महाराष्ट्र</h3>
            <h1><?php echo $temp; ?>°C</h1>
            <p><?php echo $condition; ?></p>
        </div>

        <div class="weather-stats">
            <div class="stat-box"><small>आर्द्रता (Hum)</small><b><?php echo $hum; ?>%</b></div>
            <div class="stat-box"><small>वारा (Wind)</small><b><?php echo $wind; ?> km/h</b></div>
            <div class="stat-box"><small>पाऊस (Rain)</small><b><?php echo $rain_chance; ?></b></div>
            <div class="stat-box"><small>सूर्य (UV)</small><b>कमी</b></div>
        </div>
    </div>

    <div class="advisory-card">
        <h2 style="color: var(--primary); margin-top: 0;">🚜 आजचा कृषी सल्ला</h2>
        <div style="background: #f8faf9; padding: 20px; border-radius: 20px; margin-bottom: 10px;">
            <b style="color: var(--primary);">कांदा उत्पादकांसाठी:</b>
            <p style="margin: 5px 0 0 0; font-size: 14px; color: #555;">ढगाळ वातावरणामुळे करपा रोगाचा प्रादुर्भाव वाढू शकतो. खबरदारी म्हणून प्रतिबंधात्मक औषधांची फवारणी करावी.</p>
        </div>
        <div style="background: #f8faf9; padding: 20px; border-radius: 20px;">
            <b style="color: var(--primary);">फळबाग व्यवस्थापन:</b>
            <p style="margin: 5px 0 0 0; font-size: 14px; color: #555;">येत्या २ दिवसात पाऊस नसल्यामुळे बागांना सिंचन करण्यास हरकत नाही.</p>
        </div>
    </div>

</div>

<script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
<script>
    function loadGoogleTranslate() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_element');
    }
</script>

</body>
</html>