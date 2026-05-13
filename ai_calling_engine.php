<?php
require_once 'connection1.php';

// Check if a location is selected for the broadcast
$selected_location = isset($_GET['location']) ? $_GET['location'] : '';
$farmers = [];

if ($selected_location) {
    $sql = "SELECT name, phone, location FROM users WHERE role = 'farmer' AND location = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selected_location);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $farmers[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Voice Dispatcher | Krushi Tadnya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        .wave { animation: wave 1s infinite alternate; }
        @keyframes wave { from { height: 5px; } to { height: 30px; } }
    </style>
</head>
<body class="bg-[#0b0f19] text-white font-sans p-8">

    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-black text-emerald-400">AI CALLING ENGINE</h1>
                <p class="text-slate-400 text-sm uppercase tracking-widest font-bold">Mass Alert Automation</p>
            </div>
            <div class="bg-emerald-500/10 border border-emerald-500/20 px-4 py-2 rounded-full flex items-center gap-2">
                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-ping"></span>
                <span class="text-xs font-bold text-emerald-500 uppercase">System Ready</span>
            </div>
        </div>

        <div class="bg-slate-900 border border-white/10 p-6 rounded-3xl mb-8">
            <form method="GET" class="flex gap-4">
                <select name="location" class="flex-1 bg-slate-800 border border-white/10 p-4 rounded-2xl outline-none focus:border-emerald-500">
                    <option value="">Select Location to Broadcast</option>
                    <option value="Akole">Akole</option>
                    <option value="Junnar">Junnar</option>
                    <option value="Manchar">Manchar</option>
                </select>
                <button type="submit" class="bg-white text-black font-black px-8 rounded-2xl hover:bg-emerald-400 transition">FETCH FARMERS</button>
            </form>
        </div>

        <?php if ($selected_location): ?>
        <div class="grid gap-4">
            <h3 class="text-lg font-bold">Found <?php echo count($farmers); ?> Farmers in <?php echo $selected_location; ?></h3>
            
            <?php foreach ($farmers as $index => $farmer): ?>
            <div class="bg-slate-900/50 border border-white/5 p-5 rounded-2xl flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-full flex items-center justify-center text-emerald-500 font-bold">
                        <?php echo strtoupper($farmer['name'][0]); ?>
                    </div>
                    <div>
                        <p class="font-bold"><?php echo $farmer['name']; ?></p>
                        <p class="text-xs text-slate-500"><?php echo $farmer['phone']; ?></p>
                    </div>
                </div>
                
                <button onclick="triggerAICall('<?php echo $farmer['name']; ?>', '<?php echo $farmer['location']; ?>', this)" 
                        class="bg-emerald-600 hover:bg-emerald-500 px-4 py-2 rounded-xl text-xs font-black uppercase flex items-center gap-2 transition">
                    <i data-lucide="phone-forwarded" class="w-3 h-3"></i> Trigger Call
                </button>
            </div>
            <?php endforeach; ?>

            <button onclick="triggerMassCall()" class="mt-6 w-full bg-red-600 hover:bg-red-500 py-5 rounded-3xl font-black text-xl shadow-2xl shadow-red-600/20 uppercase tracking-tighter">
                EXECUTE MASS BROADCAST
            </button>
        </div>
        <?php endif; ?>
    </div>

    <div id="call-overlay" class="fixed inset-0 bg-black/90 hidden flex-col items-center justify-center z-50">
        <div class="flex gap-2 items-end mb-8 h-20">
            <div class="w-2 bg-emerald-500 wave" style="animation-delay: 0.1s"></div>
            <div class="w-2 bg-emerald-400 wave" style="animation-delay: 0.3s"></div>
            <div class="w-2 bg-emerald-600 wave" style="animation-delay: 0.2s"></div>
            <div class="w-2 bg-emerald-300 wave" style="animation-delay: 0.4s"></div>
        </div>
        <h2 id="calling-text" class="text-3xl font-black mb-2">CALLING FARMER...</h2>
        <p id="target-phone" class="text-emerald-500 font-mono tracking-widest"></p>
        <button onclick="closeCall()" class="mt-10 bg-white/10 border border-white/20 px-8 py-3 rounded-full text-xs font-bold uppercase tracking-widest">End Simulation</button>
    </div>

    <script>
        function triggerAICall(name, location, btn) {
            const overlay = document.getElementById('call-overlay');
            const text = document.getElementById('calling-text');
            overlay.classList.remove('hidden');
            overlay.classList.add('flex');
            
            text.innerText = `Calling ${name}...`;

            // THE AI VOICE LOGIC
            const synth = window.speechSynthesis;
            const msg = new SpeechSynthesisUtterance();
            msg.text = `Namaskar ${name}. Krushi Tadnya AI Assistant bolat aahe. ${location} madhe aaj bhari pausachi shakyata aahe. Krupaya pikanchi kaalji ghya. Dhanyawaad.`;
            msg.lang = 'hi-IN';
            msg.rate = 0.85;

            synth.speak(msg);

            msg.onend = () => {
                setTimeout(closeCall, 2000);
                btn.innerHTML = "CALL COMPLETED ✓";
                btn.classList.replace('bg-emerald-600', 'bg-slate-700');
            };
        }

        function triggerMassCall() {
            alert("Executing Mass Broadcast to all farmers in this region via AI Cloud Gateway...");
            // In a real demo, you'd loop through all buttons and click them
        }

        function closeCall() {
            document.getElementById('call-overlay').classList.add('hidden');
            window.speechSynthesis.cancel();
        }

        lucide.createIcons();
    </script>
</body>
</html>