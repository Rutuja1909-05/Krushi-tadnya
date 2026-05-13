<?php 
require 'connection1.php'; 

// --- 1. POPULATION & CONSUMPTION CONFIG (India Level) ---
$population_size = 1400000000; // 1.4 Billion
$consumption_rates = [
    'wheat'    => 0.075, // 75kg per person/year
    'onion'    => 0.015, // 15kg per person/year
    'bijli'    => 0.005, // Estimated Industrial/Decorative
    'soyabean' => 0.012, // Oil/Feed demand
    'maize'    => 0.020, // Food/Feed
    'tomato'   => 0.012  // 12kg per person/year
];

// --- 2. GLOBAL SYNC LOGIC ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'sync_market') {
    $crop = mysqli_real_escape_string($conn, strtolower($_POST['crop']));
    $amount = floatval($_POST['amount']);

    // Check if record exists
    $check = mysqli_query($conn, "SELECT * FROM crop_demand WHERE LOWER(crop_name) = '$crop'");
    if(mysqli_num_rows($check) > 0) {
        $sql = "UPDATE crop_demand SET total_supply = total_supply + $amount WHERE LOWER(crop_name) = '$crop'";
    } else {
        $sql = "INSERT INTO crop_demand (crop_name, total_supply) VALUES ('$crop', $amount)";
    }
    
    if (mysqli_query($conn, $sql)) { echo "Sync_Success"; } 
    exit; 
}

// --- 3. FETCH GLOBAL MARKET DATA ---
$crops_data = [];
$res = mysqli_query($conn, "SELECT * FROM crop_demand");
while($row = mysqli_fetch_assoc($res)) {
    $crops_data[strtolower($row['crop_name'])] = $row;
}

$my_crops = [
    'wheat' => 'wheat.jpg',
    'onion' => 'onion.avif',
    'bijli' => 'bijli.jpg',
    'soyabean' => 'soyabean.jpg',
    'maize' => 'maize.jpeg',
    'tomato' => 'tomato.jpg'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Market Pulse | AgriPro</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #1b4332;
            --accent: #52b788;
            --danger: #ef4444;
            --warning: #f59e0b;
            --dark-glass: rgba(0, 0, 0, 0.85);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            background: #121212 url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
            background-size: cover;
            padding-top: 130px;
            color: white;
            min-height: 100vh;
        }

        /* --- NAV BAR --- */
        .nav-wrapper { position: fixed; top: 15px; left: 50%; transform: translateX(-50%); width: 95%; z-index: 2000; }
        nav { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(15px); padding: 10px 40px; border-radius: 100px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
        .nav-item { text-decoration: none; color: var(--primary); font-size: 10px; font-weight: 800; display: flex; flex-direction: column; align-items: center; text-transform: uppercase; }
        .nav-item img { width: 22px; margin-bottom: 3px; }

        .row { display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; padding: 20px; }

        /* --- CROP CARD --- */
        .crop-card {
            width: 280px; height: 520px; border-radius: 40px; position: relative; overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.1);
            background-size: cover; background-position: center; display: flex; flex-direction: column; justify-content: flex-end;
        }

        .bottle-container {
            position: absolute; top: 35px; left: 50%; transform: translateX(-50%);
            width: 65px; height: 180px; background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px); border: 3px solid rgba(255, 255, 255, 0.8);
            border-radius: 20px; overflow: hidden;
        }

        .liquid {
            width: 100%; position: absolute; bottom: 0; left: 0;
            transition: height 2.5s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1;
        }

        .card-content {
            background: var(--dark-glass); backdrop-filter: blur(15px);
            padding: 30px 20px; border-top: 1px solid rgba(255,255,255,0.1); text-align: center;
        }

        h2 { margin: 0 0 5px 0; font-size: 18px; font-weight: 800; letter-spacing: 1px; }
        .status-text { font-size: 10px; font-weight: 800; display: block; margin-bottom: 12px; }

        input {
            width: 100%; padding: 12px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.2);
            background: rgba(255,255,255,0.05); color: white; text-align: center; margin-bottom: 15px; outline: none;
        }

        .submit-btn {
            background: var(--accent); color: var(--primary); border: none; padding: 14px;
            border-radius: 50px; width: 100%; font-weight: 800; cursor: pointer;
            text-transform: uppercase; font-size: 11px; transition: 0.3s;
        }
        .submit-btn:hover { background: white; transform: scale(1.05); }
    </style>
</head>
<body>

<div class="nav-wrapper">
    <nav>
        <div style="display:flex; align-items:center; gap: 40px;">
            <div style="color: var(--primary); font-weight: 900; font-size: 24px;">Digital Shivar</div>
            <a href="home_farmer.php" class="nav-item"><img src="navicons/icons8-home-50.png">Home</a>
            <a href="analysis(1).php" class="nav-item"><img src="navicons/bar-chart.png">Analysis</a>
            <a href="productorderupload.php" class="nav-item"><img src="navicons/add-product.png">Upload</a>
        </div>
        <a href="profile.php" class="nav-item"><img src="profile_farmer.png">Profile</a>
    </nav>
</div>

<div class="row">
    <?php foreach($my_crops as $name => $img): 
        // Real National Demand calculation
        $target_demand = $population_size * ($consumption_rates[$name] ?? 0.01);
        
        $current_crop = $crops_data[strtolower($name)] ?? ['total_supply' => 0];
        $supply = floatval($current_crop['total_supply']);
        
        // Calculate percentage based on actual national numbers
        $perc = ($supply / $target_demand) * 100;
        
        // If supply is very low but exists, give minimal visible height for UI feedback
        $display_perc = ($perc > 0 && $perc < 2) ? 2 : $perc;
        if($display_perc > 100) $display_perc = 100;

        if($perc < 35) {
            $color = "#ef4444"; // Red: High Scarcity
            $status = "High Scarcity!";
        } elseif ($perc < 75) {
            $color = "#f59e0b"; // Orange: Stable
            $status = "Stable Demand";
        } else {
            $color = "#52b788"; // Green: Secure
            $status = "Market Full";
        }
    ?>
    
    <div class="crop-card" style="background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.7)), url('ratebg/<?php echo $img; ?>');">
        <div class="bottle-container">
            <div class="liquid" style="height:<?php echo $display_perc; ?>%; background:<?php echo $color; ?>; box-shadow: 0 0 25px <?php echo $color; ?>;"></div>
        </div>

        <div class="card-content">
            <h2><?php echo strtoupper($name); ?></h2>
            <span class="status-text" style="color: <?php echo $color; ?>;">
                <?php echo $status; ?> (<?php echo number_format($perc, 4); ?>%)
            </span>
            
            <input type="number" id="in-<?php echo $name; ?>" placeholder="Harvested Tonnes">
            <button class="submit-btn" onclick="sync('<?php echo $name; ?>')">Submit Sync</button>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<script>
function sync(cropName) {
    const val = document.getElementById('in-' + cropName).value;
    if(!val || val <= 0) { alert("Please enter valid tonnes"); return; }

    let formData = new FormData();
    formData.append('action', 'sync_market');
    formData.append('crop', cropName);
    formData.append('amount', val);

    fetch(window.location.href, { method: 'POST', body: formData })
    .then(r => r.text())
    .then(data => {
        alert("National Supply Synchronized!");
        location.reload();
    });
}
</script>

</body>
</html>