<?php 
// 1. DATA SOURCE (In a real project, these could come from connection1.php)
$farmer_schemes = [
    ["title" => "नमो शेतकरी महासन्मान निधी", "benefit" => "₹6,000 वार्षिक मदत", "docs" => "७/१२ उतारा, आधार कार्ड, बँक पासबुक", "tag" => "Financial"],
    ["title" => "मागेल त्याला सौर कृषी पंप", "benefit" => "९०% ते ९५% सबसिडी", "docs" => "७/१२, विहीर/बोअरवेल दाखला", "tag" => "Irrigation"],
    ["title" => "पीक विमा योजना (१ रुपया)", "benefit" => "नुकसान भरपाई संरक्षण", "docs" => "पीक पेरा दाखला, आधार कार्ड", "tag" => "Insurance"],
    ["title" => "मोफत वीज योजना २०२६", "benefit" => "कृषी पंप वीज बिल माफी", "docs" => "वीज बिल प्रत, आधार कार्ड", "tag" => "Power"]
];

$centers = [
    ["t" => "Ambegaon", "n" => "Mahalunge Padwal", "l" => 19.06396, "g" => 73.91376, "a" => "Near Hutatma Vidyalaya", "p" => "9421000202"],
    ["t" => "Ambegaon", "n" => "Manchar (Sonai)", "l" => 19.002237, "g" => 73.950677, "a" => "Shop No. 4, Sonai Complex", "p" => "9860478269"],
    ["t" => "Haveli", "n" => "Hadapsar Gaon", "l" => 18.496668, "g" => 73.941666, "a" => "Behind Kanyadan Mangal Karyalay", "p" => "9422333228"],
    ["t" => "Haveli", "n" => "Wagholi", "l" => 18.580234, "g" => 73.979814, "a" => "Opp Talati Office Baif Road", "p" => "9673227799"],
    ["t" => "Khed", "n" => "Chakan", "l" => 18.753565, "g" => 73.861216, "a" => "Vedant Sankul, Manik Chowk", "p" => "9823971301"],
    ["t" => "Junnar", "n" => "Narayangaon", "l" => 19.118119, "g" => 73.974845, "a" => "Fulsundar Market", "p" => "9975593697"],
    ["t" => "Shirur", "n" => "Shikrapur", "l" => 18.696821, "g" => 74.138833, "a" => "Pabal Chowk", "p" => "9822495733"],
];
?>
<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriConnect Pro | Farmer Schemes & E-Seva</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
    <style>
        :root {
            --primary: #1b4332;
            --accent: #52b788;
            --glass: rgba(255, 255, 255, 0.95);
            --shadow: 0 15px 35px rgba(0,0,0,0.12);
            --farm-orange: #ef6c00;
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
            top: 15px; left: 50%;
            transform: translateX(-50%);
            width: 95%; max-width: 1440px;
            z-index: 2000;
        }

        nav {
            background: var(--glass);
            backdrop-filter: blur(15px);
            padding: 10px 25px;
            border-radius: 100px;
            display: flex; align-items: center; justify-content: space-between;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255,255,255,0.6);
        }

        .menu-links { display: flex; align-items: center; gap: 2px; }

        .nav-item {
            text-decoration: none; color: var(--primary);
            padding: 8px 12px; border-radius: 50px;
            font-size: 11px; font-weight: 800;
            display: flex; flex-direction: column; align-items: center;
            text-transform: uppercase; letter-spacing: 0.3px; min-width: 80px;
        }

        .nav-item img { width: 22px; margin-bottom: 3px; }
        .nav-item:hover { background: var(--primary); color: white; transform: translateY(-3px); }
        .nav-item:hover img { filter: brightness(0) invert(1); }

        /* DROPDOWN */
        .dropdown { position: relative; }
        .drop-content {
            display: none; position: absolute; right: 0; top: 55px;
            background: white; min-width: 220px; border-radius: 24px;
            box-shadow: var(--shadow); padding: 12px; z-index: 2001;
        }
        .dropdown:hover .drop-content { display: block; animation: slideIn 0.3s ease forwards; }
        .drop-link {
            display: flex; align-items: center; gap: 12px; padding: 12px 16px;
            text-decoration: none; color: var(--primary); font-size: 14px; font-weight: 600; border-radius: 14px;
        }
        .drop-link:hover { background: #f0f7f0; color: var(--accent); }

        @keyframes slideIn { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }

        /* --- MAIN CONTENT --- */
        .main-container { padding-top: 120px; max-width: 1200px; margin: 0 auto; padding-inline: 20px; }

        /* SCHEME CARDS */
        .scheme-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; margin-bottom: 40px; }
        .scheme-card {
            background: white; padding: 25px; border-radius: 25px;
            border-left: 8px solid var(--accent); box-shadow: var(--shadow);
        }
        .scheme-card h3 { margin: 0; color: var(--primary); font-size: 1.2rem; }
        .benefit-tag { background: #e8f5e9; color: #2e7d32; padding: 5px 12px; border-radius: 50px; font-size: 12px; font-weight: 700; display: inline-block; margin: 10px 0; }

        /* SEARCH & MAP */
        .search-area { margin-bottom: 20px; position: relative; }
        #searchInput {
            width: 100%; padding: 18px 30px; border-radius: 100px;
            border: 2px solid var(--primary); font-size: 16px; outline: none;
            box-shadow: var(--shadow);
        }
        
        #results-dropdown {
            position: absolute; width: 100%; background: white; 
            border-radius: 20px; top: 70px; z-index: 100;
            box-shadow: var(--shadow); display: none; overflow: hidden;
        }
        .result-item { padding: 15px 25px; border-bottom: 1px solid #eee; cursor: pointer; }
        .result-item:hover { background: #f0f7f0; }

        #map { height: 500px; width: 100%; border-radius: 35px; border: 5px solid white; box-shadow: var(--shadow); }

        @media (max-width: 768px) {
            .nav-item span { display: none; }
            .nav-item { min-width: 50px; }
            #map { height: 350px; }
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
            <a href="labour_map.php" class="nav-item"><img src="navicons/labour.png"><span>Labour</span></a>
        </div>

        <div class="menu-links">
            <a href="profile.php" class="nav-item"><img src="profile_farmer.png"><span>Profile</span></a>
            <div class="dropdown">
                <a href="#" class="nav-item"><img src="navicons/feedback.png"><span>More ▾</span></a>
                <div class="drop-content">
                    <a href="chatbot.php" class="drop-link"><img src="navicons/chatbot.png"> Smart AI Chat</a>
                    <a href="market(updated).php" class="drop-link"><img src="navicons/price-tag.png"> Market Rates</a>
                    <a href="scheme.php" class="drop-link"><img src="navicons/scheme.avif"> Schemes</a>
                </div>
            </div>
            <div id="google_element"></div>
        </div>
    </nav>
</div>

<div class="main-container">
    <h2 style="text-align: center; color: var(--primary); font-weight: 800; font-size: 2rem;">सरकारी योजना मार्गदर्शन (२०२६)</h2>
    
    <div class="scheme-grid">
        <?php foreach ($farmer_schemes as $s): ?>
        <div class="scheme-card">
            <h3><?php echo $s['title']; ?></h3>
            <span class="benefit-tag"><?php echo $s['benefit']; ?></span>
            <p style="font-size: 13px; color: #555;">📑 <b>कागदपत्रे:</b> <?php echo $s['docs']; ?></p>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="search-area">
        <input type="text" id="searchInput" placeholder="तुमच्या गावाचे किंवा तालुक्याचे नाव टाइप करा..." onkeyup="handleSearch()">
        <div id="results-dropdown"></div>
    </div>

    <div id="map"></div>
    <p style="text-align:center; color: #666; margin-top: 15px;">📍 सर्व ३००+ अधिकृत ई-सेवा केंद्रे नकाशावर उपलब्ध आहेत.</p>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // 1. DATA & MAP SETUP
    const centers = <?php echo json_encode($centers); ?>;
    var map = L.map('map').setView([18.5204, 73.8567], 9);
    L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);

    // Icons
    const blueIcon = L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34], shadowSize: [41, 41]
    });

    const redIcon = L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [30, 45], iconAnchor: [15, 45], popupAnchor: [1, -34], shadowSize: [41, 41]
    });

    // Load All Markers
    var markerObjects = [];
    centers.forEach((c, i) => {
        var m = L.marker([c.l, c.g], {icon: blueIcon}).addTo(map)
                 .bindPopup(`<b>${c.n}</b><br>${c.a}<br>📞 ${c.p}`);
        markerObjects.push(m);
    });

    // 2. SEARCH & HIGHLIGHT LOGIC
    function handleSearch() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const dropdown = document.getElementById('results-dropdown');
        
        if(input.length < 2) { dropdown.style.display = 'none'; return; }

        const filtered = centers.filter(c => c.n.toLowerCase().includes(input) || c.t.toLowerCase().includes(input));
        
        dropdown.innerHTML = '';
        if(filtered.length > 0) {
            dropdown.style.display = 'block';
            filtered.forEach(c => {
                const item = document.createElement('div');
                item.className = 'result-item';
                item.innerHTML = `<b>${c.n}</b> <small>(${c.t})</small>`;
                item.onclick = () => highlightKendra(c);
                dropdown.appendChild(item);
            });
        }
    }

    function highlightKendra(center) {
        const idx = centers.findIndex(c => c.n === center.n);
        
        // Reset markers
        markerObjects.forEach(m => m.setIcon(blueIcon));
        
        // Highlight selected
        const m = markerObjects[idx];
        m.setIcon(redIcon);
        map.flyTo([center.l, center.g], 14);
        m.openPopup();
        
        document.getElementById('results-dropdown').style.display = 'none';
        document.getElementById('searchInput').value = center.n;
    }

    function loadGoogleTranslate() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_element');
    }
</script>
<script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>

</body>
</html>