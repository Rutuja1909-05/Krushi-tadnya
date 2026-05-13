<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nursery Care | Krushi Tadnya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #1b4332;
            --accent: #52b788;
            --glass: rgba(255, 255, 255, 0.98);
            --dark-glass: rgba(18, 18, 18, 0.85);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            background: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            color: white;
            overflow: hidden; /* Prevent body scroll, use panel scroll */
        }

        /* --- NAV BAR --- */
        .nav-wrapper { 
            position: fixed; top: 15px; left: 50%; transform: translateX(-50%); width: 96%; z-index: 3000; 
        }
        nav { 
            background: var(--glass); backdrop-filter: blur(10px); padding: 8px 25px; border-radius: 100px; 
            display: flex; align-items: center; justify-content: space-between; box-shadow: 0 10px 40px rgba(0,0,0,0.2); 
        }
        .menu-links { display: flex; align-items: center; gap: 15px; }
        .nav-item { 
            text-decoration: none; color: #333; font-size: 10px; font-weight: 800; 
            display: flex; flex-direction: column; align-items: center; text-transform: uppercase;
        }
        .nav-item img { width: 22px; height: 22px; margin-bottom: 2px; }

        /* Dropdown Styling */
        .dropdown { position: relative; display: inline-block; }
        .drop-content {
            display: none; position: absolute; right: 0; background: white; 
            min-width: 200px; box-shadow: 0 8px 16px rgba(0,0,0,0.1); border-radius: 15px; overflow: hidden; z-index: 1;
        }
        .dropdown:hover .drop-content { display: block; }
        .drop-link {
            padding: 12px 16px; text-decoration: none; color: #333; display: flex; 
            align-items: center; gap: 10px; font-size: 12px; font-weight: 600;
        }
        .drop-link:hover { background: #f4f4f4; }
        .drop-link img { width: 18px; }

        /* --- DASHBOARD LAYOUT --- */
        .main-layout {
            margin-top: 110px;
            padding: 20px 40px;
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 25px;
            height: calc(100vh - 130px);
        }

        .glass-panel {
            background: var(--dark-glass);
            backdrop-filter: blur(20px);
            border-radius: 35px;
            border: 1px solid rgba(255,255,255,0.1);
            padding: 30px;
            overflow-y: auto;
        }

        /* Form Controls */
        label { font-size: 10px; font-weight: 800; color: #52b788; text-transform: uppercase; letter-spacing: 1px; }
        select { 
            width: 100%; padding: 12px; margin: 8px 0 20px; border-radius: 15px; 
            background: rgba(255,255,255,0.05); color: white; border: 1px solid rgba(255,255,255,0.1);
            outline: none; cursor: pointer;
        }
        option { background: #1b4332; color: white; }

        /* --- TABLE ENHANCEMENT --- */
        .nursery-table { width: 100%; border-collapse: separate; border-spacing: 0 10px; }
        .nursery-table th { color: #52b788; text-transform: uppercase; font-size: 10px; padding: 10px; text-align: left; }
        .nursery-row { background: rgba(255,255,255,0.03); transition: 0.3s; }
        .nursery-row:hover { background: rgba(255,255,255,0.08); transform: scale(1.01); }
        .nursery-row td { padding: 15px; border-top: 1px solid rgba(255,255,255,0.05); border-bottom: 1px solid rgba(255,255,255,0.05); }
        .nursery-row td:first-child { border-left: 1px solid rgba(255,255,255,0.05); border-radius: 20px 0 0 20px; }
        .nursery-row td:last-child { border-right: 1px solid rgba(255,255,255,0.05); border-radius: 0 20px 20px 0; }

        .thumbnail { width: 70px; height: 70px; object-fit: cover; border-radius: 15px; border: 2px solid rgba(82, 183, 136, 0.3); }
        .contact-btn {
            background: var(--accent); color: var(--primary); padding: 8px 15px; 
            border-radius: 10px; font-weight: 800; font-size: 11px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: var(--accent); border-radius: 10px; }
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
                        <a href="feedback.php" class="drop-link"><img src="navicons/feedback.png"> Feedback</a>
                        <a href="contact.php" class="drop-link"><img src="navicons/phone.png"> Support</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="main-layout">
        <aside class="glass-panel">
            <div class="flex items-center gap-3 mb-8">
                <i data-lucide="search" class="text-accent"></i>
                <h2 class="text-xl font-black">Find Nurseries</h2>
            </div>
            
            <label>Select Region</label>
            <select id="area">
                <option value="">All Areas</option>
                <option value="akole">Akole</option>
                <option value="junnar">Junnar</option>
                <option value="manchar">Manchar</option>
            </select>

            <label>Sapling Type</label>
            <select id="saplingType">
                <option value="">All Types</option>
                <option value="marigold">Marigold</option>
                <option value="shevanti">Shevanti</option>
                <option value="chilli">Chilli</option>
                <option value="brinjal">Brinjal</option>
                <option value="capsicum">Capsicum</option>
                <option value="bijli">Bijli</option>
            </select>

            <div class="mt-10 p-5 bg-white/5 rounded-3xl border border-white/10">
                <p class="text-[11px] text-gray-400 italic">"Verified nurseries provide healthy, disease-free saplings for better yield."</p>
            </div>
        </aside>

        <section class="glass-panel">
            <table id="nurseryTable" class="nursery-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nursery Name</th>
                        <th>Location</th>
                        <th>Specialty</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody id="nurseryBody">
                    </tbody>
            </table>
        </section>
    </div>

    <script>
        var nurseries = [
            { image: 'nursery/marigold.jpg', name: 'Pratik HiTech Nursery', location: 'Akole, Maharashtra', contact: '9890791285', area: 'akole', saplingType: 'marigold' },
            { image: 'nursery/shevanti.webp', name: 'Junnar Gardens Nursery', location: 'Junnar, Maharashtra', contact: '9623826903', area: 'junnar', saplingType: 'shevanti' },
            { image: 'nursery/chilli.jpg', name: 'Manchar Plantation Nursery', location: 'Manchar, Maharashtra', contact: '9623826903', area: 'manchar', saplingType: 'chilli' },
            { image: 'nursery/brinjal.webp', name: 'Sunrise Nursery', location: 'Akole, Maharashtra', contact: '9022180363', area: 'akole', saplingType: 'brinjal' },
            { image: 'nursery/capsicum.webp', name: 'Bali Raja', location: 'Junnar, Maharashtra', contact: '8999370690', area: 'junnar', saplingType: 'capsicum' },
            { image: 'nursery/bijli.webp', name: 'Golden Fields Nursery', location: 'Manchar, Maharashtra', contact: '9890791285', area: 'manchar', saplingType: 'bijli' },
            { image: 'nursery/marigold.jpg', name: 'Pratik HiTech Nursery', location: 'Narayangaon', contact: '9012209090', area: 'junnar', saplingType: ['marigold', 'shevanti', 'chilli', 'brinjal', 'capsicum', 'bijli'] }
        ];

        function displayNurseries() {
            var area = document.getElementById('area').value;
            var saplingType = document.getElementById('saplingType').value;
            var tbody = document.getElementById('nurseryBody');
            tbody.innerHTML = '';

            var matchingNurseries = nurseries.filter(function(n) {
                return (area === '' || n.area === area) && 
                       (saplingType === '' || (Array.isArray(n.saplingType) ? n.saplingType.includes(saplingType) : n.saplingType === saplingType));
            });

            matchingNurseries.forEach(function(n) {
                var row = document.createElement('tr');
                row.className = 'nursery-row';
                row.innerHTML = `
                    <td><img src="${n.image}" class="thumbnail"></td>
                    <td><div class="font-bold text-white">${n.name}</div></td>
                    <td><div class="text-xs text-gray-400">${n.location}</div></td>
                    <td><span class="text-xs text-accent font-bold uppercase">${Array.isArray(n.saplingType) ? "Premium All-Type" : n.saplingType}</span></td>
                    <td><a href="tel:${n.contact}" class="contact-btn"><i data-lucide="phone" class="w-3 h-3"></i> ${n.contact}</a></td>
                `;
                tbody.appendChild(row);
            });
            lucide.createIcons();
        }

        document.getElementById('area').addEventListener('change', displayNurseries);
        document.getElementById('saplingType').addEventListener('change', displayNurseries);
        
        window.onload = () => {
            displayNurseries();
            lucide.createIcons();
        };
    </script>
</body>
</html>