<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interactive Crop Price Chatbot</title>
  <style>
    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: rgba(51, 51, 51, 0.395);
      padding: 10px;
      text-align: center;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 1000;
      height: 60px;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    #chat-container {
      max-width: 400px;
      width: 100%;
      background-color: rgba(18, 4, 4, 0.331); /* Transparent white background */
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin: 20px;
      box-sizing: border-box;
    }

    #chat-log {
      height: 250px;
      overflow-y: scroll;
      padding: 20px;
      box-sizing: border-box;
    }

    #user-input {
      width: calc(100% - 40px);
      padding: 10px;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid #ddd;
      font-size: 16px;
      outline: none;
      margin: 0 20px;
      background-color: rgba(255, 255, 255, 0.5); /* Slightly transparent white background */
    }

    #send-button {
        margin-left: 150px;
        align-items: center;
      background-color: #69d120b0;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 0 0 10px 10px;
      transition: background-color 0.3s;
    }

    #send-button:hover {
      background-color: #45a049;
    }

    .message {
      margin-bottom: 10px;
    }

    .user {
      color: #2196F3;
    }

    .bot {
      color: #e7f3e7;
    }

    h1 {
      text-align: center;
      color: #ece7e7;
      
    }

    /* ... (your existing styles) ... */

    #area-selection {
      padding-top: 50px;
      max-width: 400px;
      width: 100%;
      background-color: rgba(18, 4, 4, 0.331); /* Transparent white background */
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin: 20px;
      box-sizing: border-box;
    }

    #area-dropdown {
      width: calc(100% - 40px);
      padding: 10px;
      box-sizing: border-box;
      font-size: 16px;
      outline: none;
      margin: 10px 20px;
    }

    #pdf-container {
      max-width: 400px;
      width: 100%;
      background-color: rgba(18, 4, 4, 0.331);
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin: 20px;
      box-sizing: border-box;
    }

    #pdf-iframe {
      width: 100%;
      height: 400px;
      border: none;
    }
  </style>
</head>
<body>
  <header>
    <img src="coollogo_com-128613146.png" height="50px">
  </header>

 

  <!-- Chat Container -->
  <div id="chat-container">
    <h1> MARKET RATE </h1>
    <div id="chat-log"></div>
    <input type="text" id="user-input" placeholder="Type a crop name...">
    <button id="send-button" onclick="sendMessage()">Send</button>
  </div>

  

  <script>
     function sendMessage() {
      const userInput = document.getElementById('user-input').value;
      const chatLog = document.getElementById('chat-log');

      // Display user message in the chat log
      appendMessage('User', userInput, 'user');

      // Simulate chatbot response
      const botResponse = getBotResponse(userInput);
      appendMessage('Bot', botResponse, 'bot');

      // Clear user input
      document.getElementById('user-input').value = '';
    }

    function appendMessage(sender, message, className) {
      const chatLog = document.getElementById('chat-log');
      const messageElement = document.createElement('div');
      messageElement.className = `message ${className}`;
      messageElement.innerHTML = `<strong>${sender}:</strong> ${message}`;
      chatLog.appendChild(messageElement);

      // Scroll to the bottom of the chat log
      chatLog.scrollTop = chatLog.scrollHeight;
    }

    function getBotResponse(userInput) {
      // Mock logic: Simulate crop prices based on the user input
      const cropPrices = {
        'wheat': '50.00 per kg',
        'corn': '40.50 per kg',
        'soybeans': '30.00 per kg',
        'onion': '50.00 per kg',
        // Add more crops as needed
      };

      const lowercaseInput = userInput.toLowerCase();
      const price = cropPrices[lowercaseInput];

      if (price) {
        return `The market price for ${userInput} is ${price}.`;
      } else {
        return `I'm sorry, I don't have information on the market price for ${userInput}.`;
      }
    }
    // ... (your existing JavaScript) ...

    // Function to load PDF based on selected area
    
  </script>
</body>
</html>
