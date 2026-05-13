<?php
/**
 * AgriConnect Pro - Carbon Credit Module (2026 Updated)
 * सर्व माहिती एकाच ठिकाणी
 */

// २०२६ मार्केट रेट (अंदाजे ₹७२० प्रति टन)
$current_rate = 720; 

$carbon_methods = [
    ["title" => "वृक्षारोपण (Agroforestry)", "earn" => "High", "desc" => "शेताच्या बांधावर फळझाडे लावून कर्ब साठवणूक करणे.", "icon" => "🌳"],
    ["title" => "शून्य मशागत (No-Till)", "earn" => "Medium", "desc" => "जमिनीची नांगरणी टाळून सेंद्रिय कर्ब जमिनीत रोखणे.", "icon" => "🚜"],
    ["title" => "आच्छादन पिके (Cover Cropping)", "earn" => "Medium", "desc" => "जमीन हिरवळीच्या पिकांनी झाकून जमिनीचा कस वाढवणे.", "icon" => "🌿"]
];
?>
<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>कार्बन क्रेडिट मार्गदर्शन | AgriConnect Pro</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #1b4332;
            --accent: #52b788;
            --glass: rgba(255, 255, 255, 0.95);
            --shadow: 0 15px 35px rgba(0,0,0,0.12);
        }

        * { box-sizing: border-box; transition: all 0.3s ease; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;  background: #f0f4f2 url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
            background-size: cover; color: #1a1a1a; line-height: 1.6;

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
            text-transform: uppercase; min-width: 80px;
        }
        .nav-item img { width: 22px; margin-bottom: 3px; }
        .nav-item:hover { background: var(--primary); color: white; }

        /* --- MAIN CONTENT --- */
        .main-container {
            padding-top: 130px; max-width: 1100px; margin: 0 auto;
            padding-inline: 20px; padding-bottom: 80px;
        }

        /* WALLET HEADER */
        .wallet-header {
            background: linear-gradient(135deg, var(--primary), #081c15);
            color: white; padding: 50px; border-radius: 40px;
            display: flex; justify-content: space-between; align-items: center;
            box-shadow: var(--shadow); margin-bottom: 40px;
        }
        .balance-box h1 { font-size: 3.5rem; margin: 10px 0; color: var(--accent); font-weight: 800; }
        
        /* CALCULATOR */
        .calc-card {
            background: white; padding: 40px; border-radius: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); margin-bottom: 40px;
        }
        .input-group { display: flex; gap: 20px; margin-top: 25px; }
        input { flex: 1; padding: 18px 25px; border-radius: 20px; border: 2px solid #eee; font-size: 1.2rem; outline: none; }

        /* PORTAL CARDS */
        .portal-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 30px; }
        .portal-card { background: #f0f7f0; padding: 25px; border-radius: 20px; border-left: 5px solid var(--accent); }
        
        .method-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; }
        .method-card { background: white; padding: 30px; border-radius: 25px; border-bottom: 6px solid var(--accent); box-shadow: 0 4px 15px rgba(0,0,0,0.03); }

        @media (max-width: 768px) {
            .nav-item span { display: none; }
            .wallet-header { flex-direction: column; text-align: center; }
            .balance-box h1 { font-size: 2.5rem; }
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
            <a href="carbon.php" class="nav-item"><img src="navicons/carbon.png"><span>Carbon</span></a>
        </div>
        <div class="menu-links">
            <a href="profile.php" class="nav-item"><img src="profile_farmer.png"><span>Profile</span></a>
            <div id="google_element"></div>
        </div>
    </nav>
</div>

<div class="main-container">
    
    <div class="wallet-header">
        <div class="balance-box">
            <span style="opacity: 0.8; font-weight: 700;">तुमची अंदाजित कार्बन कमाई (२०२६)</span>
            <h1 id="displayEarnings">₹ 0.00</h1>
            <p>बाजार भाव: ₹<?php echo $current_rate; ?> / टन CO₂e</p>
        </div>
        <div style="text-align: center; background: rgba(255,255,255,0.1); padding: 20px; border-radius: 20px;">
            <div style="font-size: 40px;">🌱</div>
            <b>Climate Champion</b>
        </div>
    </div>

    <div class="calc-card">
        <h2 style="margin-top:0; color: var(--primary);">तुमची क्षमता तपासा</h2>
        <div class="input-group">
            <input type="number" id="acreInput" placeholder="जमीन एकरमध्ये टाका (उदा. 5)" oninput="calculateCarbon()">
            <input type="text" value="दर एकरी २.५ टन कार्बन" disabled style="background: #f0f4f2; flex: 0.5; font-weight: bold;">
        </div>
    </div>

    <div style="margin-bottom: 50px; background: white; padding: 35px; border-radius: 30px; box-shadow: var(--shadow);">
        <h2 style="color: var(--primary); margin-top:0;">नोंदणी कुठे करावी? (Official Portals)</h2>
        <div class="portal-grid">
            <div class="portal-card">
                <h3>१. इंडियन कार्बन मार्केट (ICM)</h3>
                <p>भारत सरकारचे अधिकृत <b>BEE Portal</b>. येथे मोठ्या शेतकरी गटांची (FPO) नोंदणी केली जाते.</p>
                <a href="https://beeindia.gov.in" target="_blank" style="color: var(--accent); font-weight: bold;">वेबसाईट पहा ↗</a>
            </div>
            <div class="portal-card">
                <h3>२. अधिकृत संस्था (Aggregators)</h3>
                <p><b>Grow Indigo</b> किंवा <b>Varaha</b> सारख्या संस्था वैयक्तिक शेतकऱ्यांना मार्केटशी जोडतात.</p>
            </div>
            <div class="portal-card">
                <h3>३. स्थानिक FPO केंद्र</h3>
                <p>तुमच्या तालुक्यातील शेतकरी उत्पादक कंपनीमार्फत नोंदणी करणे सर्वात सोपे आणि स्वस्त पडते.</p>
            </div>
        </div>
    </div>

    <h2 style="color: var(--primary); margin-bottom: 25px;">कार्बन साठवण्याच्या पद्धती</h2>
    <div class="method-grid">
        <?php foreach($carbon_methods as $m): ?>
        <div class="method-card">
            <div style="font-size: 35px;"><?php echo $m['icon']; ?></div>
            <h3><?php echo $m['title']; ?></h3>
            <p style="font-size: 13px; color: #666;"><?php echo $m['desc']; ?></p>
            <button style="width:100%; padding:10px; background:var(--accent); border:none; border-radius:10px; font-weight:bold; cursor:pointer;">अधिक माहिती</button>
        </div>
        <?php endforeach; ?>
    </div>

    <div style="background: #fff3e0; padding: 25px; border-radius: 20px; margin-top: 40px; border-left: 10px solid #ff9800;">
        <h4 style="margin:0; color: #e65100;">📑 आवश्यक कागदपत्रे:</h4>
        <p style="margin: 5px 0 0 0; color: #bf360c; font-size: 14px;">
            १. डिजिटल ७/१२ उतारा | २. आधार कार्ड (बँक लिंक) | ३. सॉईल हेल्थ कार्ड | ४. जमिनीचा Geo-tagged नकाशा.
        </p>
    </div>

</div>

<script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
<script>
    function loadGoogleTranslate() { new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_element'); }
    function calculateCarbon() {
        const acres = document.getElementById('acreInput').value;
        const ratePerTon = <?php echo $current_rate; ?>;
        if(acres > 0) {
            const total = acres * 2.5 * ratePerTon;
            document.getElementById('displayEarnings').innerText = "₹ " + total.toLocaleString('en-IN');
        } else {
            document.getElementById('displayEarnings').innerText = "₹ 0.00";
        }
    }
</script>

</body>
</html>