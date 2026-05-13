<?php require_once 'connection1.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organic Experts & Earnings | AgriConnect</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1b4332;
            --accent: #52b788;
            --organic-gold: #ffd700;
            --glass: rgba(255, 255, 255, 0.9);
            --dark-glass: rgba(0, 0, 0, 0.7);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            background: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            padding-top: 120px;
            padding-bottom: 100px;
        }

        /* --- NAV BAR (Same as Home) --- */
        .nav-wrapper { position: fixed; top: 15px; left: 50%; transform: translateX(-50%); width: 95%; z-index: 2000; }
        nav { background: var(--glass); backdrop-filter: blur(15px); padding: 10px 25px; border-radius: 100px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        .nav-item { text-decoration: none; color: var(--primary); font-size: 11px; font-weight: 800; display: flex; flex-direction: column; align-items: center; text-transform: uppercase; min-width: 80px; }
        .nav-item img { width: 22px; margin-bottom: 3px; }

        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }

        /* --- EXPERT PORTFOLIOS --- */
        .expert-title { text-align: center; margin-bottom: 40px; }
        .expert-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        
        .expert-card {
            background: var(--dark-glass);
            backdrop-filter: blur(20px);
            border-radius: 40px;
            padding: 30px;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.2);
            transition: 0.3s;
        }
        
        .expert-card:hover { transform: translateY(-10px); border-color: var(--accent); }
        
        .expert-img {
            width: 120px; height: 120px;
            border-radius: 50%;
            border: 4px solid var(--accent);
            margin-bottom: 20px;
            object-fit: cover;
        }

        .expert-card h3 { margin: 10px 0; color: var(--accent); }
        .expert-card p { font-size: 0.9rem; opacity: 0.8; line-height: 1.5; }
        .specialty {
            display: inline-block;
            background: rgba(82, 183, 136, 0.2);
            color: var(--accent);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
            margin-top: 10px;
        }

        /* --- EARNING PROJECTION BOX --- */
        .earning-box {
            background: var(--glass);
            color: var(--primary);
            border-radius: 40px;
            padding: 40px;
            margin-top: 60px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.5);
        }

        .earning-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .calc-card {
            background: #f8fafc;
            padding: 25px;
            border-radius: 25px;
            border: 2px solid #e2e8f0;
        }

        .calc-card.organic { border-color: var(--accent); background: #f0fdf4; }
        
        .price-big { font-size: 2.5rem; font-weight: 800; margin: 10px 0; }
        .green-text { color: #166534; }
        .red-text { color: #991b1b; }

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
    <div class="expert-title">
        <h1 style="font-size: 3rem;">Global Mentors</h1>
        <p>Learn from farmers who are already earning in Foreign Currency (USD/Euro).</p>
    </div>

    <div class="expert-grid">
        <div class="expert-card">
            <img src="https://images.unsplash.com/photo-1560343090-f0409e92791a?auto=format&fit=crop&w=200" class="expert-img">
            <h3>Dr. Sameer Deshmukh</h3>
            <p>20 years experience in Soil Carbon restoration. Helped 5,000+ farmers switch from Urea to Jeevamrut.</p>
            <span class="specialty">SOIL DOCTOR</span>
        </div>

        <div class="expert-card">
            <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=200" class="expert-img">
            <h3>Sunita More</h3>
            <p>Export specialist. Successfully exporting Organic Turmeric to Dubai and London for 8 years.</p>
            <span class="specialty">EXPORT GURU</span>
        </div>

        <div class="expert-card">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200" class="expert-img">
            <h3>Rahul Patil</h3>
            <p>Master of Natural Pest Control. Developed the 'Zero-Cost' biological spray model for cotton farmers.</p>
            <span class="specialty">BIO-PEST MASTER</span>
        </div>
    </div>

    <div class="earning-box">
        <h2 style="text-align: center; margin-bottom: 5px;">Projected Earnings (per 1 Acre)</h2>
        <p style="text-align: center; color: #666; margin-bottom: 30px;">Why "Videsi Kamai" is a reality, not a dream.</p>

        <div class="earning-grid">
            <div class="calc-card">
                <h3 class="red-text">Normal Hybrid Farming</h3>
                <p>Input Cost (Seeds + Chemicals): <b>₹25,000</b></p>
                <p>Average Selling Price:</p>
                <div class="price-big red-text">₹70,000</div>
                <hr>
                <p><b>Net Profit: <span class="red-text">₹45,000</span></b></p>
            </div>

            <div class="calc-card organic">
                <h3 class="green-text">Premium Organic Farming</h3>
                <p>Input Cost (Homemade Bio-inputs): <b>₹8,000</b></p>
                <p>Global Export Price:</p>
                <div class="price-big green-text">₹1,85,000</div>
                <hr>
                <p><b>Net Profit: <span class="green-text">₹1,77,000</span></b></p>
            </div>
        </div>
        
        <div style="margin-top: 30px; text-align: center; background: #e2e8f0; padding: 15px; border-radius: 15px;">
            <p style="font-weight: 800; margin: 0;">Organic Benefit: You earn <b>3.9x more</b> profit per acre.</p>
        </div>
    </div>
</div>

<div class="sticky-wisdom">
    "असेल पेरणी देशी तर होईल कमाई विदेशी"
</div>

</body>
</html>