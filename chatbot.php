<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agri-Intelligence Center | 2026 Live Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #1b4332;
            --accent: #52b788;
            --glass: rgba(255, 255, 255, 0.9);
            --dark-glass: rgba(0, 0, 0, 0.75);
            --neon-gold: #ffd700;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            background: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            overflow: hidden;
            color: white;
        }

        .nav-wrapper {
            position: fixed;
            top: 7px;
            left: 50%;
            transform: translateX(-50%);
            width: 95%;
            z-index: 2000;
        }

        nav {
            background: var(--glass);
            backdrop-filter: blur(15px);
            padding: 10px 25px;
            border-radius: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .nav-item {
            text-decoration: none;
            color: var(--primary);
            font-size: 11px;
            font-weight: 800;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-transform: uppercase;
            min-width: 80px;
        }

        .nav-item img {
            width: 22px;
            margin-bottom: 3px;
        }

        .dashboard {
            display: grid;
            grid-template-columns: 300px 1fr 300px;
            gap: 20px;
            padding: 0 30px;
            margin-top: 120px;
            height: calc(100vh - 160px);
        }

        .sidebar {
            background: var(--dark-glass);
            backdrop-filter: blur(20px);
            border-radius: 35px;
            padding: 20px;
            overflow-y: auto;
        }

        .news-ticker {
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 15px;
            border: 1px solid var(--accent);
            color: var(--neon-gold);
            font-size: 13px;
            font-weight: 700;
        }

        .card-item {
            background: rgba(255,255,255,0.08);
            padding: 15px;
            border-radius: 20px;
            margin-bottom: 15px;
        }

        #chat-container {
            background: var(--dark-glass);
            border-radius: 35px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        #chat-log {
            flex: 1;
            padding: 25px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .message {
            padding: 15px;
            border-radius: 20px;
            max-width: 85%;
            font-size: 14px;
        }

        .user {
            align-self: flex-end;
            background: var(--accent);
            color: var(--primary);
            font-weight: 700;
        }

        .bot {
            align-self: flex-start;
            background: rgba(255,255,255,0.1);
        }

        .input-area {
            padding: 15px;
            display: flex;
            gap: 10px;
            background: rgba(0,0,0,0.4);
        }

        #user-input {
            flex: 1;
            padding: 12px 18px;
            border-radius: 25px;
            border: none;
            background: rgba(255,255,255,0.15);
            color: white;
        }

        #send-button {
            background: var(--accent);
            color: var(--primary);
            border: none;
            padding: 0 25px;
            border-radius: 25px;
            font-weight: 800;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="nav-wrapper">
    <nav>
        <div style="display:flex; align-items:center;">
            <img src="coollogo_com-128613146.png" height="35" style="margin-right:20px;">
            <a href="#" class="nav-item">Home</a>
            <a href="#" class="nav-item">Analysis</a>
            <a href="#" class="nav-item">Upload</a>
        </div>
        <a href="#" class="nav-item">Profile</a>
    </nav>
</div>

<div class="dashboard">

    <div class="sidebar">
        <h3 style="color:var(--accent);">🌱 New Varieties 2026</h3>
        <div class="card-item"><b>Pusa Harsh-21</b><br>Drought resistant rice</div>
        <div class="card-item"><b>Black Rice</b><br>High export demand</div>
        <div class="card-item"><b>Karan-15 Wheat</b><br>Heat tolerant</div>
    </div>

    <div id="chat-container">
        <div id="chat-log">
            <div class="message bot">
                Welcome! Ask me about crops, fertilizer, weather or market prices 🌾
            </div>
        </div>
        <div class="input-area">
            <input type="text" id="user-input" placeholder="Ask your farming question...">
            <button id="send-button" onclick="sendMessage()">ASK</button>
        </div>
    </div>

    <div class="sidebar">
        <div class="news-ticker">📢 LIVE NEWS</div>
        <div class="card-item">Rice export ban lifted – prices rising</div>
        <div class="card-item">Solar pump subsidy open</div>
        <div class="card-item">Unseasonal rain alert</div>
    </div>

</div>

<script>
const agriKnowledge = [
  {
    keys: ["rice", "paddy"],
    ans: "🌾 Pusa Harsh-21 is best for low water areas. Saves 30% water and gives 25% higher yield. Use AWD irrigation and clay-loam soil."
  },
  {
    keys: ["wheat"],
    ans: "🌾 Karan-15 wheat is heat tolerant. Sow between 10–25 Nov. Apply potassium before flowering to reduce heat stress."
  },
  {
    keys: ["fertilizer", "urea"],
    ans: "🧪 Avoid excess urea. Follow soil test. Split nitrogen doses and add FYM for long-term soil health."
  },
  {
    keys: ["price", "market"],
    ans: "📈 Rice prices may rise 15–20% due to export reopening. Sell through FPOs for better margin."
  },
  {
    keys: ["weather", "rain"],
    ans: "🌦️ Unseasonal rain risk. Harvest at correct moisture and protect stored grain with tarpaulin."
  }
];

function sendMessage() {
    const input = document.getElementById("user-input");
    const text = input.value.trim().toLowerCase();
    if (!text) return;

    append("You", input.value, "user");
    input.value = "";

    let reply = "Please ask about rice, wheat, fertilizer, market or weather 🌱";

    agriKnowledge.forEach(item => {
        item.keys.forEach(k => {
            if (text.includes(k)) reply = item.ans;
        });
    });

    setTimeout(() => append("AgriBot", reply, "bot"), 400);
}

function append(sender, msg, cls) {
    const chat = document.getElementById("chat-log");
    const div = document.createElement("div");
    div.className = "message " + cls;
    div.innerHTML = "<b>" + sender + ":</b><br>" + msg;
    chat.appendChild(div);
    chat.scrollTop = chat.scrollHeight;
}

document.getElementById("user-input")
.addEventListener("keypress", e => {
    if (e.key === "Enter") sendMessage();
});
</script>

</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agri-Intelligence Center | 2026 Live Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #1b4332;
            --accent: #52b788;
            --glass: rgba(255, 255, 255, 0.9);
            --dark-glass: rgba(0, 0, 0, 0.75);
            --neon-gold: #ffd700;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            background: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=2000') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            overflow: hidden;
            color: white;
        }

        .nav-wrapper {
            position: fixed;
            top: 7px;
            left: 50%;
            transform: translateX(-50%);
            width: 95%;
            z-index: 2000;
        }

        nav {
            background: var(--glass);
            backdrop-filter: blur(15px);
            padding: 10px 25px;
            border-radius: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .nav-item {
            text-decoration: none;
            color: var(--primary);
            font-size: 11px;
            font-weight: 800;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-transform: uppercase;
            min-width: 80px;
        }

        .dashboard {
            display: grid;
            grid-template-columns: 300px 1fr 300px;
            gap: 20px;
            padding: 0 30px;
            margin-top: 100px;
            height: calc(100vh - 140px);
        }

        .sidebar {
            background: var(--dark-glass);
            backdrop-filter: blur(20px);
            border-radius: 35px;
            padding: 20px;
            overflow-y: auto;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .news-ticker {
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 15px;
            border: 1px solid var(--accent);
            color: var(--neon-gold);
            font-size: 13px;
            font-weight: 700;
        }

        .card-item {
            background: rgba(255,255,255,0.08);
            padding: 15px;
            border-radius: 20px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        #chat-container {
            background: var(--dark-glass);
            backdrop-filter: blur(25px);
            border-radius: 35px;
            display: flex;
            flex-direction: column;
            height: 100%;
            border: 1px solid rgba(255,255,255,0.1);
            overflow: hidden;
        }

        #chat-log {
            flex: 1;
            padding: 25px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .message {
            padding: 15px 20px;
            border-radius: 20px;
            max-width: 85%;
            font-size: 14px;
            line-height: 1.5;
        }

        .user {
            align-self: flex-end;
            background: var(--accent);
            color: var(--primary);
            font-weight: 700;
            border-bottom-right-radius: 5px;
        }

        .bot {
            align-self: flex-start;
            background: rgba(255,255,255,0.1);
            border-bottom-left-radius: 5px;
            color: #e0e0e0;
        }

        .input-area {
            padding: 20px;
            display: flex;
            gap: 12px;
            background: rgba(0,0,0,0.4);
        }

        #user-input {
            flex: 1;
            padding: 14px 20px;
            border-radius: 30px;
            border: 1px solid rgba(255,255,255,0.2);
            background: rgba(255,255,255,0.1);
            color: white;
            outline: none;
        }

        #send-button {
            background: var(--accent);
            color: var(--primary);
            border: none;
            padding: 0 30px;
            border-radius: 30px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.3s;
        }

        #send-button:hover {
            transform: scale(1.05);
            background: #fff;
        }

        /* Scrollbar styling */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 10px; }
    </style>
</head>
<body>

<div class="nav-wrapper">
    <nav>
        <div style="display:flex; align-items:center; gap: 20px;">
            <div style="font-weight: 800; color: #1b4332; font-size: 20px;">Digital Shivar</div>
            <a href="home_farmer.php" class="nav-item">Home</a>
            <a href="#" class="nav-item">Analysis</a>
            <a href="#" class="nav-item">Upload</a>
        </div>
        <a href="#" class="nav-item">Profile</a>
    </nav>
</div>

<div class="dashboard">
    <div class="sidebar">
        <h3 style="color:var(--accent); margin-bottom: 20px;">🌱 New Varieties 2026</h3>
        <div class="card-item"><b>Pusa Harsh-21</b><br>Drought resistant rice</div>
        <div class="card-item"><b>Black Rice</b><br>High export demand</div>
        <div class="card-item"><b>Karan-15 Wheat</b><br>Heat tolerant</div>
    </div>

    <div id="chat-container">
        <div id="chat-log">
            <div class="message bot">
                <b>AgriBot:</b><br>Welcome to AgriBot!  Ask me anything about crops, soil health, or market trends 🌾
            </div>
        </div>
        <div class="input-area">
            <input type="text" id="user-input" placeholder="Ask your farming question...">
            <button id="send-button" onclick="sendMessage()">ASK AI</button>
        </div>
    </div>

    <div class="sidebar">
        <div class="news-ticker">📢 LIVE NEWS</div>
        <div class="card-item">Rice export ban lifted – prices rising</div>
        <div class="card-item">Solar pump subsidy open</div>
        <div class="card-item">Unseasonal rain alert for Maharashtra</div>
    </div>
</div>

<script>
    // Configuration
    const API_KEY = "AIzaSyD6CJ_f-A__Ou-XAt2hn8spekj8ksFdwTg"; 
    // Note: Updated model name to gemini-1.5-flash for maximum reliability
    const API_URL = `https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent?key=${API_KEY}`;

    async function sendMessage() {
        const input = document.getElementById("user-input");
        const userText = input.value.trim();
        
        if (!userText) return;

        appendMessage("You", userText, "user");
        input.value = "";

        const botMessageDiv = appendMessage("AgriBot", "कृषी माहिती शोधत आहे (Analyzing)...", "bot");

        try {
            // THE INJECTION: We tell Gemini exactly who it is
            const systemInstruction = `You are "AgriBot", a specialized 2026 AI for Indian Farmers. 
            RULES:
            1. ONLY discuss agriculture, crops, fertilizer, seeds, weather, and farming market prices.
            2. If the user asks about anything else (politics, entertainment, general coding, etc.), say: "I apologize, but I am specifically designed to help with Indian Agriculture. Please ask me about crops, soil, or farming techniques."
            3. Always mention specific Indian crop varieties or government schemes when relevant.
            4. Keep answers concise and helpful for a farmer.
            5. You do NOT mention you are an AI from Google or Gemini. You are the 'Agri-Intelligence Center Hub'.`;

            const response = await fetch(API_URL, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    contents: [{
                        parts: [{
                            text: `${systemInstruction}\n\nUser Question: ${userText}`
                        }]
                    }]
                })
            });

            const data = await response.json();
            
            if (data.candidates && data.candidates[0].content.parts[0].text) {
                const aiResponse = data.candidates[0].content.parts[0].text;
                botMessageDiv.innerHTML = "<b>AgriBot:</b><br>" + formatAIResponse(aiResponse);
            } else {
                throw new Error("Empty Response");
            }

        } catch (error) {
            console.error("Error:", error);
            botMessageDiv.innerHTML = "<b>AgriBot:</b><br>Error connecting to the Hub. Please check your network.";
        }
    }

    // Helper: Append message to chat log
    function appendMessage(sender, msg, cls) {
        const chatLog = document.getElementById("chat-log");
        const div = document.createElement("div");
        div.className = "message " + cls;
        div.innerHTML = "<b>" + sender + ":</b><br>" + msg;
        chatLog.appendChild(div);
        chatLog.scrollTop = chatLog.scrollHeight;
        return div;
    }

    // Helper: Format AI Response
    function formatAIResponse(text) {
        return text
            .replace(/\n/g, "<br>") 
            .replace(/\*\*(.*?)\*\*/g, "<b>$1</b>") 
            .replace(/\*(.*?)\*/g, "<i>$1</i>");
    }

    document.getElementById("user-input").addEventListener("keypress", (e) => {
        if (e.key === "Enter") sendMessage();
    });
</script>
</body>
</html>