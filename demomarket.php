<?php
// State configuration
$activeState = "Maharashtra";

// Define exactly 2 crops and their PDF paths
$crops = [
    "Sugarcane" => "pdfs/maharashtra_sugarcane.pdf",
    "Cotton" => "pdfs/maharashtra_cotton.pdf"
];

$jsonCrops = json_encode($crops);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krishi Tajna - MH Analysis</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        
        body {
            background: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=2000') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Glass Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            margin: 20px 50px;
            padding: 12px 40px;
            border-radius: 100px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }
        .logo { color: #1b4332; font-weight: 800; font-size: 24px; letter-spacing: -0.5px; }
        .nav-links { display: flex; gap: 45px; }
        .nav-item { text-align: center; cursor: pointer; color: #2d6a4f; font-size: 10px; font-weight: 700; transition: 0.3s; }
        .nav-item:hover { transform: translateY(-2px); color: #000; }

        /* Content Layout */
        .main-wrapper {
            display: flex;
            gap: 30px;
            padding: 0 50px 40px;
            flex: 1;
        }

        .panel {
            background: rgba(15, 23, 42, 0.7); /* Deep dark glass */
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 45px;
            color: white;
            padding: 40px;
        }

        /* Fixed width for exactly 2 crops */
        .left-panel {
            width: 350px;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center buttons vertically */
        }

        .right-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 15px;
        }

        h2 { 
            text-align: center; 
            font-size: 14px; 
            color: #4ade80; 
            letter-spacing: 3px; 
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        /* Large Selection Buttons */
        .crop-btn {
            background: rgba(255, 255, 255, 0.05);
            padding: 30px 20px;
            margin-bottom: 20px;
            border-radius: 25px;
            cursor: pointer;
            text-align: center;
            font-size: 18px;
            font-weight: 600;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .crop-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: scale(1.05);
            border-color: #4ade80;
        }
        .crop-btn.active {
            background: linear-gradient(135deg, #2d6a4f 0%, #1b4332 100%);
            border-color: #4ade80;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }

        iframe { width: 100%; height: 100%; border-radius: 35px; border: none; }
        .placeholder { color: #64748b; font-size: 16px; font-weight: 500; }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">कृषी तज्ञ</div>
        <div class="nav-links">
            <div class="nav-item">HOME</div>
            <div class="nav-item">ANALYSIS</div>
            <div class="nav-item">UPLOAD</div>
        </div>
        <div class="nav-item">PROFILE</div>
    </nav>

    <div class="main-wrapper">
        <div class="panel left-panel">
            <h2>MAHARASHTRA REGION</h2>
            <div id="btnGroup">
                </div>
        </div>

        <div class="panel right-panel" id="viewer">
            <div class="placeholder">Select a crop to view the analysis report</div>
        </div>
    </div>

    <script>
        const data = <?php echo $jsonCrops; ?>;
        const btnGroup = document.getElementById('btnGroup');
        const viewer = document.getElementById('viewer');

        // Create the buttons
        Object.keys(data).forEach(crop => {
            const btn = document.createElement('div');
            btn.className = 'crop-btn';
            btn.innerText = crop;
            
            btn.onclick = () => {
                // UI Toggle
                document.querySelectorAll('.crop-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                // Show PDF
                viewer.innerHTML = `<iframe src="${data[crop]}#toolbar=0"></iframe>`;
            };
            
            btnGroup.appendChild(btn);
        });
    </script>
</body>
</html>