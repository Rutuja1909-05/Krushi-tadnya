<?php
/**
 * AgriConnect Pro - Industry Raw Material Module
 * अपडेट: शेवटचा विभाग सोयाबीन ऐवजी झेंडू (Marigold) पिकासाठी अपडेट केला आहे.
 */

$industry_partners = [
    [
        "crop" => "Grapes (द्राक्षे)",
        "type" => "Wine & Juice Processing",
        "image" => "products/grapes.jpg",
        "capabilities" => ["Premium Wine Production", "Grape Juice Concentrate", "Raisin Processing"],
        "industry" => "Oniv Beverages",
        "address" => "Narayangaon, Tal. Junnar, Pune District",
        "phone" => "9011055667"
    ],
    [
        "crop" => "Onion (कांदा)",
        "type" => "Dehydration & Powder",
        "image" => "products/onion.jpg",
        "capabilities" => ["Onion Flakes", "Kanda Lasun Masala Base", "Dehydrated Powder"],
        "industry" => "Jain Farm Fresh / स्थानिक युनिट",
        "address" => "Chakan MIDC, Pune / Jalgaon H.O.",
        "phone" => "9822012345"
    ],
    [
        "crop" => "Tomato (टोमॅटो)",
        "type" => "Food Processing",
        "image" => "products/tomato.jpg",
        "capabilities" => ["Commercial Ketchup", "Salsa Base", "Puree"],
        "industry" => "Mangalam Food - AK Group",
        "address" => "Swami Bungalow, MG Road, Nashik Road",
        "phone" => "7947151826"
    ],
    [
        "crop" => "Marigold (झेंडू)",
        "type" => "Floral & Chemical Processing",
        "image" => "products/marigold.jpg",
        "capabilities" => ["Essential Perfume Oils", "High-Grade Incense", "Poultry Feed Pigments"],
        "industry" => "Greeneri Premium Agarbatti",
        "address" => "Gate No-9, Godaun No-182, Gultekdi Road, Pune - 411037",
        "phone" => "9035297344"
    ]
];
?>
<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>उद्योग संपर्क | Krushi Tadnya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    
    <style>
        :root { --primary: #1b4332; --accent: #52b788; --dark-glass: rgba(18, 18, 18, 0.9); }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f0f4f2 url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0; padding-top: 130px;
        }

        /* --- NAV BAR --- */
        .nav-wrapper { position: fixed; top: 15px; left: 50%; transform: translateX(-50%); width: 95%; z-index: 3000; }
        nav { background: white; padding: 10px 40px; border-radius: 100px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 10px 40px rgba(0,0,0,0.2); }
        .logo-text { font-size: 28px; font-weight: 900; color: var(--primary); }
        .nav-links { display: flex; gap: 25px; }
        .nav-item { text-decoration: none; color: #333; font-size: 11px; font-weight: 800; display: flex; flex-direction: column; align-items: center; text-transform: uppercase; }
        .nav-item img { width: 22px; margin-bottom: 2px; }

        /* --- CARDS --- */
        .grid-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px; max-width: 1300px; margin: 0 auto; padding: 20px; }
        .crop-card { background: var(--dark-glass); border-radius: 40px; border: 1px solid rgba(255,255,255,0.1); overflow: hidden; backdrop-filter: blur(20px); color: white; display: flex; flex-direction: column; }
        .image-wrapper { height: 200px; position: relative; }
        .image-wrapper img { width: 100%; height: 100%; object-fit: cover; }
        .crop-badge { position: absolute; top: 15px; right: 15px; background: var(--accent); color: var(--primary); padding: 5px 15px; border-radius: 10px; font-weight: 900; font-size: 10px; }
        
        .product-tag { background: rgba(255,255,255,0.05); padding: 8px 15px; border-radius: 12px; font-size: 13px; margin-bottom: 8px; display: flex; align-items: center; gap: 10px; }
        .industry-footer { background: rgba(0,0,0,0.5); padding: 25px; border-top: 1px solid rgba(255,255,255,0.1); margin-top: auto; }
        .contact-btn { background: var(--accent); color: var(--primary); width: 100%; padding: 14px; border-radius: 15px; font-weight: 900; display: flex; justify-content: center; align-items: center; gap: 10px; transition: 0.3s; }
        .contact-btn:hover { transform: scale(1.03); }
    </style>
</head>
<body>

    <div class="nav-wrapper">
        <nav>
            <div class="logo-text">कृषी तज्ज्ञ</div>
            <div class="nav-links">
                <a href="home_farmer.php" class="nav-item"><img src="navicons/icons8-home-50.png">Home</a>
                <a href="market_rates.php" class="nav-item"><img src="navicons/price-tag.png">Market</a>
                <a href="weather_updates.php" class="nav-item"><img src="navicons/sun.png">Weather</a>
            </div>
            <a href="profile.php" class="nav-item"><img src="profile_farmer.png">Profile</a>
        </nav>
    </div>

    <div class="grid-container">
        <?php foreach ($industry_partners as $p): ?>
        <div class="crop-card">
            <div class="image-wrapper">
                <img src="<?php echo $p['image']; ?>" alt="<?php echo $p['crop']; ?>">
                <span class="crop-badge"><?php echo $p['type']; ?></span>
            </div>
            <div class="p-8">
                <h2 class="text-2xl font-black mb-4 flex items-center gap-2">
                    <i data-lucide="sprout" class="text-accent"></i> <?php echo $p['crop']; ?>
                </h2>
                <p class="text-[10px] uppercase font-bold text-gray-400 mb-4 tracking-widest">Processing Capabilities</p>
                <?php foreach ($p['capabilities'] as $cap): ?>
                    <div class="product-tag"><i data-lucide="check-circle" class="w-4 h-4 text-accent"></i> <?php echo $cap; ?></div>
                <?php endforeach; ?>
            </div>
            <div class="industry-footer">
                <h3 class="text-[10px] font-bold text-gray-400 uppercase mb-2 tracking-widest">Processor Info</h3>
                <div class="text-accent font-bold text-lg"><?php echo $p['industry']; ?></div>
                <div class="text-gray-400 text-xs italic mb-4"><?php echo $p['address']; ?></div>
                <a href="tel:<?php echo $p['phone']; ?>" class="contact-btn">
                    <i data-lucide="phone-call" class="w-4 h-4"></i> कॉल करा: <?php echo $p['phone']; ?>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>