<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interactive Crop Price Data</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: url('artem-kniaz-RWeO3t9FxG0-unsplash.jpg') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .container {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
      text-align: center;
    }

    select {
      padding: 10px;
      margin: 10px 0;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
      width: 100%;
      box-sizing: border-box;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-top: 10px;
    }

    button:hover {
      background-color: #45a049;
    }

    .more-crops-container {
      margin-top: 20px; /* Adjust as needed */
    }

    .marquee {
      width: 100%;
      overflow: hidden;
      white-space: nowrap;
    }

    .marquee span {
      display: inline-block;
      padding-left: 100%;
      animation: marquee 15s linear infinite;
      color: #4CAF50; /* Light green color */
    }

    @keyframes marquee {
      0% { transform: translate(0, 0); }
      100% { transform: translate(-100%, 0); }
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Select State and Crop Type</h2>

  <!-- State Dropdown -->
  <select id="stateSelect" onchange="updateCropDropdown()">
    <option value="">Select State</option>
    <option value="maharashtra">Maharashtra</option>
    <option value="punjab">Punjab</option>
    <!-- Add more states as needed -->
  </select>

  <!-- Crop Type Dropdown -->
  <select id="cropSelect">
    <option value="">Select Crop Type</option>
    <option value="marigold">Marigold</option>
    <option value="Rice">Rice</option>
    <option value="Corn">Corn</option>
    <option value="Wheat">Wheat</option>
    <option value="Cotton">Cotton</option>
    <!-- Add more crop options as needed -->
  </select>

  <!-- Open PDF Button -->
  <button onclick="openPDF()">Open PDF</button>

  <!-- More Crops Container -->
  <div class="more-crops-container">
    <!-- Check for More Crops Button -->
    <button onclick="checkMoreCrops()">Check for More Crops</button>

    <!-- Marquee for More Crops -->
    <div class="marquee">
      <span>Click here to check for more crops</span>
    </div>
  </div>
</div>

<script>
  // Crop data based on state
  const cropData = {
    maharashtra: ['marigold', 'Rice', 'Cotton'],
    punjab: ['Wheat', 'Rice', 'Cotton'],
    // Add more state-crop mappings as needed
  };

  // Function to update crop dropdown based on selected state
  function updateCropDropdown() {
    const stateSelect = document.getElementById('stateSelect');
    const cropSelect = document.getElementById('cropSelect');
    const selectedState = stateSelect.value;

    // Clear existing options
    cropSelect.innerHTML = '<option value="">Select Crop Type</option>';

    // Populate crop options based on selected state
    if (selectedState && cropData[selectedState]) {
      cropData[selectedState].forEach(crop => {
        const option = document.createElement('option');
        option.value = crop;
        option.textContent = crop;
        cropSelect.appendChild(option);
      });
    }
  }

  // Function to open PDF based on selected state and crop type
  function openPDF() {
    const stateSelect = document.getElementById('stateSelect').value;
    const cropSelect = document.getElementById('cropSelect').value;

    // Open PDF based on selected crop type
    switch (cropSelect) {
      case 'marigold':
        window.open('marigold_1.pdf', '_blank');
        break;
      case 'Rice':
        window.open('rice.pdf_1', '_blank');
        break;
      case 'Corn':
        window.open('path/to/corn.pdf', '_blank');
        break;
      case 'Wheat':
        window.open('path/to/wheat.pdf', '_blank');
        break;
      case 'Cotton':
        window.open('cotton.pdf_1', '_blank');
        break;
      default:
        alert('Please select a crop type');
    }
  }

  // Function to handle clicking "Check for More Crops" button
  function checkMoreCrops() {
    // Open the website for more crops
    window.open('https://agmarknet.gov.in/PriceAndArrivals/DatewiseCommodityReport.aspx', '_blank');
  }
</script>

</body>
</html>
