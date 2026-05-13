<?php
require("connection1.php"); // DB connection

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fertilizer = $_POST['fertilizer'];
    $seeds = $_POST['seeds'];
    $labour = $_POST['labour'];
    $other = $_POST['other'];
    $total = $fertilizer + $seeds + $labour + $other;

    $sql = "INSERT INTO expenses (fertilizer, seeds, labour, other, total) 
            VALUES ('$fertilizer', '$seeds', '$labour', '$other', '$total')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Expense added successfully! Total: ₹$total');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch all records
$result = $conn->query("SELECT * FROM expenses ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Krushi Tadnya – Expense Tracker</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      min-height: 100vh;
      font-family: Arial, sans-serif;
      background: url('background.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
    }
    .header {
      width: 100%;
      background: #2e7d32;
      color: white;
      text-align: center;
      padding: 15px 0;
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 20px;
      border-radius: 0 0 15px 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
    .container {
      background: rgba(255, 255, 255, 0.95);
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
      max-width: 650px;
      width: 100%;
      margin-bottom: 30px;
    }
    .container h2 {
      text-align: center;
      color: #2e7d32;
      margin-bottom: 20px;
    }
    form label {
      font-weight: bold;
      display: block;
      margin: 10px 0 5px;
      color: #333;
    }
    form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }
    .btn {
      background: #2e7d32;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      width: 100%;
      font-size: 18px;
      cursor: pointer;
    }
    .btn:hover { background: #1b5e20; }
    .table-container {
      background: rgba(255, 255, 255, 0.95);
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
      max-width: 900px;
      width: 100%;
      overflow-x: auto;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: center;
    }
    th {
      background: #2e7d32;
      color: white;
    }
    tr:nth-child(even) {
      background: #f9f9f9;
    }
    .total-row {
      font-weight: bold;
      background: #c8e6c9;
    }
  </style>
</head>
<body>
  <div class="header">🌱 Krushi Tadnya – Expense Tracker</div>

  <div class="container">
    <h2>Add New Expense</h2>
    <form method="POST" action="">
      <label>Fertilizer Cost (₹)</label>
      <input type="number" name="fertilizer" required>

      <label>Seeds Cost (₹)</label>
      <input type="number" name="seeds" required>

      <label>Labour Cost (₹)</label>
      <input type="number" name="labour" required>

      <label>Other Costs (₹)</label>
      <input type="number" name="other" required>

      <button type="submit" class="btn">💾 Save Expense</button>
    </form>
  </div>

  <div class="table-container">
    <h2 style="text-align:center; color:#2e7d32;">📊 Expense Records</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Fertilizer (₹)</th>
        <th>Seeds (₹)</th>
        <th>Labour (₹)</th>
        <th>Other (₹)</th>
        <th>Total (₹)</th>
      </tr>
      <?php
      $grand_total = 0;
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>{$row['id']}</td>
                      <td>{$row['fertilizer']}</td>
                      <td>{$row['seeds']}</td>
                      <td>{$row['labour']}</td>
                      <td>{$row['other']}</td>
                      <td><b>{$row['total']}</b></td>
                    </tr>";
              $grand_total += $row['total'];
          }
          echo "<tr class='total-row'>
                  <td colspan='5'>Grand Total</td>
                  <td>₹{$grand_total}</td>
                </tr>";
      } else {
          echo "<tr><td colspan='6'>No records found</td></tr>";
      }
      ?>
    </table>
  </div>
</body>
</html>
