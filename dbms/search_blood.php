<?php
$blood_type = $_POST['blood_type'];
$conn = new mysqli("localhost", "root", "", "bloodb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bloodbank WHERE bl_type = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $blood_type);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Result</title>
  <style>
    body { font-family: Arial; background-color: #fff; text-align: center; padding: 50px; }
    table {
      width: 90%; margin: auto; border-collapse: collapse;
      box-shadow: 0 0 10px #ccc;
    }
    th, td {
      padding: 10px; border: 1px solid #aaa; text-align: center;
    }
    th { background-color: #28a745; color: white; }
    .available { color: green; font-size: 18px; }
    .not-available { color: red; font-size: 18px; }
    button {
      padding: 10px 20px; background-color: #007bff; color: white;
      border: none; border-radius: 5px; margin-top: 20px;
      cursor: pointer;
    }
    button:hover { background-color: #0056b3; }
  </style>
</head>
<body>
<?php if ($result->num_rows > 0) { ?>
  <h2 class="available">Blood type <strong><?= htmlspecialchars($blood_type) ?></strong> is available.</h2>
  <table>
    <tr>
      <th>Blood Bank ID</th>
      <th>Name</th>
      <th>Address</th>
      <th>Donor ID</th>
      <th>Blood ID</th>
      <th>Blood Type</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['b_bank_id'] ?></td>
      <td><?= $row['b_bank_name'] ?></td>
      <td><?= $row['b_bank_address'] ?></td>
      <td><?= $row['donor_id'] ?></td>
      <td><?= $row['bl_id'] ?></td>
      <td><?= $row['bl_type'] ?></td>
    </tr>
    <?php } ?>
  </table>
<?php } else { ?>
  <h2 class="not-available">Sorry, blood type <strong><?= htmlspecialchars($blood_type) ?></strong> is not available.</h2>
<?php } ?>
<br>
<button onclick="window.location.href='search_blood.html'">Search Again</button>
</body>
</html>
<?php $conn->close(); ?>
