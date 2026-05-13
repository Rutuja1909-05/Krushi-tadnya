<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Krushi Tadnya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .glass-container {
            background: rgba(18, 18, 18, 0.85);
            backdrop-filter: blur(20px);
            border-radius: 40px;
            border: 1px solid rgba(255,255,255,0.1);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
        }
        input, select {
            background: rgba(255,255,255,0.05) !important;
            border: 1px solid rgba(255,255,255,0.1) !important;
            color: white !important;
            border-radius: 15px !important;
            padding: 12px 15px !important;
        }
        input:focus {
            border-color: #52b788 !important;
            outline: none;
        }
        .btn-submit {
            background: #52b788;
            color: #1b4332;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
        }
        .btn-submit:hover {
            transform: scale(1.02);
            filter: brightness(1.1);
        }
    </style>
</head>
<body>

<div class="glass-container">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-black text-white">कृषी तज्ञ</h2>
        <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mt-2">Create Your Account</p>
    </div>

    <form action="register_process.php" method="post" class="space-y-4">
        <div>
            <label class="text-[10px] font-bold text-emerald-400 uppercase ml-2">Full Name</label>
            <input type="text" name="name" class="w-full mt-1" placeholder="Enter full name" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-[10px] font-bold text-emerald-400 uppercase ml-2">Username</label>
                <input type="text" name="username" class="w-full mt-1" required>
            </div>
            <div>
                <label class="text-[10px] font-bold text-emerald-400 uppercase ml-2">Mobile No</label>
                <input type="text" name="phone" class="w-full mt-1" placeholder="For SMS Alerts" required>
            </div>
        </div>

        <div>
            <label class="text-[10px] font-bold text-emerald-400 uppercase ml-2">Email Address</label>
            <input type="email" name="email" class="w-full mt-1" required>
        </div>
           <div>
    <label class="text-[10px] font-bold text-emerald-400 uppercase ml-2">Your Location</label>
    <select name="location" class="w-full mt-1" required>
        <option value="Akole">Akole</option>
        <option value="Junnar">Junnar</option>
        <option value="Manchar">Manchar</option>
        <option value="Sangamner">Sangamner</option>
    </select>
</div>
        <div>
            <label class="text-[10px] font-bold text-emerald-400 uppercase ml-2">Password</label>
            <input type="password" name="password" class="w-full mt-1" required>
        </div>

        <div>
            <label class="text-[10px] font-bold text-emerald-400 uppercase ml-2">I am a...</label>
            <div class="flex gap-4 mt-2">
                <label class="flex items-center gap-2 text-white text-sm cursor-pointer">
                    <input type="radio" name="role" value="farmer" required checked> Farmer
                </label>
                <label class="flex items-center gap-2 text-white text-sm cursor-pointer">
                    <input type="radio" name="role" value="buyer" required> Buyer
                </label>
            </div>
        </div>

        <button type="submit" class="w-full btn-submit py-4 rounded-2xl mt-4">Register Now</button>
    </form>
</div>

</body>
</html>