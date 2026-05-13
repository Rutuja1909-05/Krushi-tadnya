<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fertilizer Calculator</title>
</head>
<body>
  <h1>Fertilizer Calculator</h1>
  <form method="post">
    <label for="crop">Crop Type:</label>
    <select name="crop" id="crop">
      <option value="wheat">Wheat</option>
      <option value="rice">Rice</option>
      <option value="corn">Corn</option>
      <option value="soybeans">Soybeans</option>
      <!-- Add more crop options as needed -->
    </select><br><br>
    <label for="soil">Soil Type:</label>
    <select name="soil" id="soil">
      <option value="sandy">Sandy</option>
      <option value="clay">Clay</option>
      <option value="loamy">Loamy</option>
      <!-- Add more soil options as needed -->
    </select><br><br>
    <label for="nutrient">Nutrient Requirement (kg/acre):</label>
    <input type="number" name="nutrient" id="nutrient" required><br><br>
    <button type="submit" name="submit">Calculate</button>
  </form>

  <?php
  // Define fertilizer recommendations for each crop and soil type
  $fertilizerRecommendations = [
    'wheat' => [
      'sandy' => 'NPK 10-20-10',
      'clay' => 'NPK 15-15-15',
      'loamy' => 'NPK 12-12-12',
    ],
    'rice' => [
      'sandy' => 'NPK 10-20-10',
      'clay' => 'NPK 15-15-15',
      'loamy' => 'NPK 12-12-12',
    ],
    'corn' => [
      'sandy' => 'NPK 10-20-10',
      'clay' => 'NPK 15-15-15',
      'loamy' => 'NPK 12-12-12',
    ],
    'soybeans' => [
      'sandy' => 'NPK 10-20-10',
      'clay' => 'NPK 15-15-15',
      'loamy' => 'NPK 12-12-12',
    ],
    // Add more crop and soil recommendations as needed
  ];

  // Process form submission
  if (isset($_POST['submit'])) {
    // Get user inputs
    $selectedCrop = $_POST['crop'];
    $selectedSoil = $_POST['soil'];
    $nutrientRequirement = $_POST['nutrient'];

    // Display recommended fertilizer
    if (array_key_exists($selectedCrop, $fertilizerRecommendations) && array_key_exists($selectedSoil, $fertilizerRecommendations[$selectedCrop])) {
      $recommendedFertilizer = $fertilizerRecommendations[$selectedCrop][$selectedSoil];
      echo "<h2>Recommended Fertilizer:</h2>";
      echo "<p>$recommendedFertilizer</p>";
    } else {
      echo "<p>No recommended fertilizer found for the selected crop and soil type.</p>";
    }
  }
  ?>
</body>
</html>
