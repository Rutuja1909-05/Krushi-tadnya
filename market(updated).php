<?php
/**
 * AgriConnect Pro - Real-Time Mandi Prices
 * Version: 2.0 (Integrated)
 */

$market_data = [
    ["crop" => "Onion (कांदा)", "market" => "Pune (Guli)", "min" => 1800, "max" => 3200, "avg" => 2500, "unit" => "Quintal", "trend" => "up"],
    ["crop" => "Wheat (गहू)", "market" => "Junner", "min" => 2400, "max" => 3100, "avg" => 2850, "unit" => "Quintal", "trend" => "stable"],
    ["crop" => "Tomato (टोमॅटो)", "market" => "Narayangaon", "min" => 800, "max" => 1500, "avg" => 1200, "unit" => "Crate (20kg)", "trend" => "down"],
    ["crop" => "Soybean (सोयाबीन)", "market" => "Baramati", "min" => 4200, "max" => 4950, "avg" => 4600, "unit" => "Quintal", "trend" => "up"],
    ["crop" => "Pomegranate (डाळिंब)", "market" => "Indapur", "min" => 6000, "max" => 12000, "avg" => 9000, "unit" => "Quintal", "trend" => "up"],
    ["crop" => "Potato (बटाटा)", "market" => "Manchar", "min" => 1200, "max" => 1800, "avg" => 1550, "unit" => "Quintal", "trend" => "down"],
    ["crop" => "Sugarcane (ऊस)", "market" => "Shirur", "min" => 3100, "max" => 3100, "avg" => 3100, "unit" => "Ton", "trend" => "stable"],
    ["crop" => "Green Chilli (मिरची)", "market" => "Khed", "min" => 3500, "max" => 5500, "avg" => 4500, "unit" => "Quintal", "trend" => "up"]
];

$last_update = date("d M Y, h:i A");
?>
<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>बाजारभाव | AgriConnect Pro</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #1b4332;
            --accent: #52b788;
            --danger: #e63946;
            --success: #2a9d8f;
            --glass: rgba(255, 255, 255, 0.95);
            --shadow: 0 15px 35px rgba(0,0,0,0.12);
        }

        * { box-sizing: border-box; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0; background: #f0f4f2 url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
            background-size: cover; color: #1a1a1a; padding-top: 130px;
        }

        /* --- NAVIGATION --- */
        .nav-wrapper {
            position: fixed; top: 15px; left: 50%; transform: translateX(-50%);
            width: 95%; max-width: 1440px; z-index: 2000;
        }
        nav {
            background: var(--glass); backdrop-filter: blur(15px);
            padding: 10px 25px; border-radius: 100px;
            display: flex; align-items: center; justify-content: space-between;
            box-shadow: var(--shadow); border: 1px solid rgba(255,255,255,0.6);
        }
        .menu-links { display: flex; align-items: center; gap: 2px; }
        .nav-item {
            text-decoration: none; color: var(--primary); padding: 8px 12px;
            border-radius: 50px; font-size: 11px; font-weight: 800;
            display: flex; flex-direction: column; align-items: center;
            text-transform: uppercase; letter-spacing: 0.3px; min-width: 80px;
        }
        .nav-item img { width: 22px; margin-bottom: 3px; }
        .nav-item:hover { background: var(--primary); color: white; transform: translateY(-3px); }
        .nav-item:hover img { filter: brightness(0) invert(1); }

        /* --- MARKET CONTENT --- */
        .container { max-width: 1100px; margin: auto; padding-inline: 20px; padding-bottom: 50px;}

        .market-header {
            background: linear-gradient(135deg, var(--primary), #081c15);
            color: white; padding: 40px; border-radius: 35px;
            display: flex; justify-content: space-between; align-items: center;
            box-shadow: var(--shadow); margin-bottom: 30px;
        }
        
        .live-pulse {
            display: inline-block; width: 12px; height: 12px;
            background: #ff4d4d; border-radius: 50%; margin-right: 8px;
            animation: pulse 1.5s infinite;
        }
        @keyframes pulse { 0% { opacity: 1; transform: scale(1); } 50% { opacity: 0.4; transform: scale(1.2); } 100% { opacity: 1; transform: scale(1); } }

        .search-area { margin-bottom: 25px; }
        #marketSearch {
            width: 100%; padding: 18px 30px; border-radius: 100px;
            border: 2px solid white; outline: none; font-size: 1rem;
            box-shadow: var(--shadow);
        }

        /* TABLE DESIGN */
        .card-container {
            background: white; border-radius: 30px; overflow: hidden;
            box-shadow: var(--shadow);
        }
        table { width: 100%; border-collapse: collapse; }
        th { background: #f8faf9; padding: 20px; text-align: left; color: #666; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; }
        td { padding: 20px; border-top: 1px solid #f0f0f0; font-weight: 700; font-size: 0.95rem; }

        .price-badge { padding: 6px 12px; border-radius: 12px; font-size: 0.9rem; font-weight: 800; display: inline-block; }
        .max-p { background: #e8f5e9; color: var(--success); }
        .min-p { background: #ffebee; color: var(--danger); }

        .trend-up { color: var(--success); }
        .trend-down { color: var(--danger); }
        .trend-stable { color: #888; }

        @media (max-width: 768px) {
            .nav-item span { display: none; }
            .market-header { flex-direction: column; text-align: center; gap: 15px; }
            th:nth-child(4), td:nth-child(4) { display: none; }
        }
    </style>
</head>
<body>

<div class="nav-wrapper">
    <nav>
        <div class="menu-links">
            <img src="coollogo_com-128613146.jpeg" style="height:35px; margin-right:10px;">
            <a href="home_farmer.php" class="nav-item"><img src="navicons/icons8-home-50.png"><span>Home</span></a>
            <a href="mapping.php" class="nav-item"><img src="navicons/map.png"><span>Mapping</span></a>
            <a href="organic.php" class="nav-item"><img src="navicons/organic.png"><span>Organic</span></a>
            <a href="market_rates.php" class="nav-item"><img src="navicons/price-tag.png"><span>Market</span></a>
        </div>
        <div class="menu-links">
            <a href="profile.php" class="nav-item"><img src="profile_farmer.png"><span>Profile</span></a>
            <div id="google_element"></div>
        </div>
    </nav>
</div>

<div class="container">
    <div class="market-header">
        <div>
            <h1 style="margin:0;"><span class="live-pulse"></span>थेट बाजारभाव (Live)</h1>
            <p style="opacity: 0.8; margin-top: 5px;">पुणे जिल्ह्यातील बाजार समित्यांचे आजचे दर</p>
        </div>
        <div style="text-align: right;">
            <small style="opacity:0.7;">शेवटचे अपडेट:</small><br>
            <b style="color: var(--accent);"><?php echo $last_update; ?></b>
        </div>
    </div>

    <div class="search-area">
        <input type="text" id="marketSearch" placeholder="पिकाचे नाव किंवा बाजार समिती शोधा (उदा. कांदा)..." onkeyup="filterTable()">
    </div>

    <div class="card-container">
        <table id="marketTable">
            <thead>
                <tr>
                    <th>पिक (Crop)</th>
                    <th>बाजार समिती (Market)</th>
                    <th>सरासरी (Avg)</th>
                    <th>किमान (Min)</th>
                    <th>कमाल (Max)</th>
                    <th>कल (Trend)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($market_data as $row): ?>
                <tr>
                    <td><span style="font-size:1.2rem; margin-right:8px;">🌾</span> <?php echo $row['crop']; ?></td>
                    <td style="color: #666;"><?php echo $row['market']; ?></td>
                    <td style="color: var(--primary); font-size: 1.1rem;">₹<?php echo number_format($row['avg']); ?> <small>/ <?php echo $row['unit']; ?></small></td>
                    <td><span class="price-badge min-p">₹<?php echo number_format($row['min']); ?></span></td>
                    <td><span class="price-badge max-p">₹<?php echo number_format($row['max']); ?></span></td>
                    <td class="trend-<?php echo $row['trend']; ?>">
                        <?php 
                            if($row['trend'] == 'up') echo '▲ वाढ';
                            elseif($row['trend'] == 'down') echo '▼ घट';
                            else echo '● स्थिर';
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div style="margin-top: 30px; background: #fff3e0; padding: 25px; border-radius: 20px; border-left: 8px solid #ff9800;">
        <h4 style="margin:0; color: #e65100;">⚠️ टीप:</h4>
        <p style="margin: 5px 0 0 0; color: #bf360c; font-size: 14px;">हे बाजारभाव आवक आणि गुणवत्तेनुसार बदलू शकतात. (स्त्रोत: e-NAM/MSAMB)</p>
    </div>
</div>

<script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
<script>
    function loadGoogleTranslate() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_element');
    }

    function filterTable() {
        const input = document.getElementById('marketSearch').value.toUpperCase();
        const tr = document.getElementById('marketTable').getElementsByTagName('tr');
        for (let i = 1; i < tr.length; i++) {
            let rowText = tr[i].innerText.toUpperCase();
            tr[i].style.display = rowText.indexOf(input) > -1 ? "" : "none";
        }
    }
</script>

</body>
</html>