<?php require 'connection1.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriConnect Pro | Farmer Ecosystem</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #1b4332;
            --accent: #52b788;
            --glass: rgba(255, 255, 255, 0.9);
            --shadow: 0 15px 35px rgba(0,0,0,0.12);
        }

        * { box-sizing: border-box; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            background: #f0f4f2 url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #1a1a1a;
            line-height: 1.6;
        }

        /* --- MODERN CAPSULE NAVIGATION --- */
        .nav-wrapper {
            position: fixed;
            top: 15px;
            left: 50%;
            transform: translateX(-50%);
            width: 95%;
            max-width: 1440px;
            z-index: 2000;
        }

        nav {
            background: var(--glass);
            backdrop-filter: blur(15px);
            padding: 10px 25px;
            border-radius: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255,255,255,0.6);
        }

        .logo-box img { height: 42px; }

        .menu-links { display: flex; align-items: center; gap: 2px; }

        .nav-item {
            text-decoration: none;
            color: var(--primary);
            padding: 8px 12px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 800;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            min-width: 80px;
        }

        .nav-item img { width: 22px; margin-bottom: 3px; }

        .nav-item:hover { background: var(--primary); color: white; transform: translateY(-3px); }
        .nav-item:hover img { filter: brightness(0) invert(1); }

        /* --- DROPDOWN SYSTEM --- */
        .dropdown { position: relative; }
        .drop-content {
            display: none;
            position: absolute;
            right: 0;
            top: 55px;
            background: white;
            min-width: 220px;
            border-radius: 24px;
            box-shadow: var(--shadow);
            padding: 12px;
            z-index: 2001;
            border: 1px solid rgba(0,0,0,0.05);
        }
        .dropdown:hover .drop-content { display: block; animation: slideIn 0.3s ease forwards; }
        
        .drop-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            text-decoration: none;
            color: var(--primary);
            font-size: 14px;
            font-weight: 600;
            border-radius: 14px;
        }
        .drop-link:hover { background: #f0f7f0; color: var(--accent); transform: translateX(5px); }
        .drop-link img { width: 20px; }

        @keyframes slideIn { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }

        /* --- PAGE CONTENT --- */
        .main-container {
            padding-top: 130px;
            max-width: 1300px;
            margin: 0 auto;
            padding-inline: 20px;
            padding-bottom: 80px;
        }

        .hero-banner {
            background: var(--glass);
            border-radius: 45px;
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-bottom: 40px;
            border: 1px solid white;
        }
        .hero-text { padding: 70px; display: flex; flex-direction: column; justify-content: center; }
        .hero-text h1 { font-size: 3.5rem; color: var(--primary); margin: 0; line-height: 1; font-weight: 800; }
        .hero-img { background: url('Natural-farming-.jpg') center/cover; min-height: 450px; }

        /* --- QUICK SERVICES GRID --- */
        .section-title { margin: 50px 0 25px; color: var(--primary); font-weight: 800; font-size: 1.8rem; text-align: center;}
        
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
        }

        .tile {
            background: white;
            padding: 35px 20px;
            border-radius: 30px;
            text-align: center;
            text-decoration: none;
            color: var(--primary);
            font-weight: 700;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
            border: 2px solid transparent;
        }
        .tile:hover { transform: translateY(-12px); border-color: var(--accent); box-shadow: var(--shadow); }
        .tile img { width: 45px; display: block; margin: 0 auto 18px; }

        .about-card {
            background: var(--primary);
            color: white;
            padding: 60px;
            border-radius: 45px;
            margin-top: 50px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        /* --- FLOATING CONTROLS --- */
        .fab-container {
            position: fixed;
            bottom: 35px;
            right: 35px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            z-index: 3000;
        }
        .fab {
            width: 65px; height: 65px;
            background: var(--accent);
            border-radius: 22px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            cursor: pointer;
        }
        .fab:hover { background: var(--primary); transform: scale(1.1) rotate(5deg); }

        @media (max-width: 1024px) {
            .hero-banner { grid-template-columns: 1fr; }
            .nav-item span { display: none; }
            .nav-item { min-width: 45px; }
            .hero-text { padding: 40px; }
            .hero-text h1 { font-size: 2.5rem; }
        }
    </style>
</head>
<body>

<div class="nav-wrapper">
    <nav>
        <div class="menu-links">
            <img src="coollogo_com-128613146.jpeg" style="height:38px; margin-right:10px;">
            <a href="home_farmer.php" class="nav-item"><img src="navicons/icons8-home-50.png"><span>Home</span></a>
            <a href="analysis(1).php" class="nav-item"><img src="navicons/bar-chart.png"><span>Analysis</span></a>
            <a href="mapping.php" class="nav-item"><img src="navicons/map.png"><span>Mapping</span></a>
            <a href="productorderupload.php" class="nav-item"><img src="navicons/add-product.png"><span>Upload</span></a>
            <a href="organic.php" class="nav-item"><img src="navicons/organic.png"><span>Organic</span></a>
            <a href="labour_map.php" class="nav-item"><img src="navicons/labour.png"><span>Labour</span></a>
        </div>

        <div class="menu-links">
            <a href="profile.php" class="nav-item"><img src="profile_farmer.png"><span>Profile</span></a>
            <div class="dropdown">
                <a href="#" class="nav-item"><img src="navicons/feedback.png"><span>More ▾</span></a>
                <div class="drop-content">
                    <a href="chatbot.php" class="drop-link"><img src="navicons/chatbot.png"> Smart AI Chat</a>
                    <a href="market(updated).php" class="drop-link"><img src="navicons/price-tag.png"> Market Rates</a>
                    <a href="products.php" class="drop-link"><img src="navicons/delivery-box.png"> Product Store</a>
                    <a href="nursery.php" class="drop-link"><img src="navicons/nurser.avif"> Nursery Care</a>
                    <a href="carbon.php" class="drop-link"><img src="navicons/carbon.png"> Free Earn</a>
                    <a href="scheme.php" class="drop-link"><img src="navicons/scheme.avif"> schemes</a>
                    <a href="feedback.php" class="drop-link"><img src="navicons/feedback.png"> Feedback</a>
                    <a href="contact.php" class="drop-link"><img src="navicons/phone.png"> Support</a>
                </div>
            </div>
            <div id="google_element"></div>
        </div>
    </nav>
</div>

<div class="main-container">
    <div class="hero-banner">
        <div class="hero-text">
            <h1>Better Data.<br>Higher Profits.</h1>
            <p>Empowering farmers with Organic Store access, Labour mapping, and direct Market connectivity.</p>
            <div style="margin-top:25px;">
                <button onclick="speakText()" style="background:var(--primary); color:white; border:none; padding:18px 35px; border-radius:100px; font-weight:800; cursor:pointer; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    🔊 Audio Guide
                </button>
            </div>
        </div>
        <div class="hero-img"></div>
    </div>

    <h2 class="section-title">Agriculture Service Suite</h2>
    <div class="services-grid">
        <a href="organic.php" class="tile"><img src="navicons/organic.png">Organic Store</a>
        <a href="labour_map.php" class="tile"><img src="navicons/labour.png">Find Labour</a>
        <a href="productorderupload.php" class="tile"><img src="navicons/add-product.png">Upload Crop</a>
        <a href="market(updated).php" class="tile"><img src="navicons/price-tag.png">Market Rates</a>
        <a href="analysis(1).php" class="tile"><img src="navicons/bar-chart.png">Analysis</a>
        <a href="nursery.php" class="tile"><img src="navicons/nurser.avif">Nursery</a>
    </div>

    <div class="about-card">
        <h2 style="margin-top:0; font-size: 2rem;">Revolutionizing the Farm-to-Business Loop</h2>
        <p style="font-size: 1.1rem; opacity: 0.9;">Our platform is more than just a website; it’s a complete ecosystem. By integrating <strong>Organic Farming</strong> resources and <strong>Labour Mapping</strong>, we ensure you have every tool needed to succeed. Our mission is to eliminate middleman exploitation and give the power back to the farmer.</p>
    </div>
</div>

<div class="fab-container">
    <a href="labour_map.php" class="fab" title="Labour Map"><img src="navicons/labour.png" width="30" style="filter: brightness(0) invert(1);"></a>
    <a href="organic.php" class="fab" title="Organic Store"><img src="navicons/organic.png" width="30" style="filter: brightness(0) invert(1);"></a>
</div>

<script>
    function speakText() {
        const text = "Welcome. You can now access our Organic Store and Labour Mapping services directly from the main dashboard. Grow organically and find help when you need it.";
        window.speechSynthesis.speak(new SpeechSynthesisUtterance(text));
    }

    function loadGoogleTranslate() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_element');
    }
</script>
<script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>

</body>
</html>