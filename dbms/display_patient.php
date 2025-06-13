<?php
$conn = new mysqli("localhost:3306", "root", "", "bloodb");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM patient");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Patient Records</title>
  <style>
    body { font-family: Arial; background: #fff7e6; text-align: center; padding: 30px; }
    table { width: 95%; margin: auto; border-collapse: collapse; box-shadow: 0 0 10px #ccc; }
    th, td { border: 1px solid #aaa; padding: 10px; text-align: center; }
    th { background-color: #ff6600; color: white; }
    a { color: blue; text-decoration: none; }
    a:hover { text-decoration: underline; }
  </style>
</head>
<body>

<h2 style="text-align:center;">Patient Records</h2>
<table>
  <tr>
    <th>ID</th><th>Name</th><th>Address</th><th>Phone</th><th>Hospital</th><th>Blood Bank ID</th><th>Actions</th>
  </tr>
  <?php while ($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?= $row['pat_id'] ?></td>
    <td><?= $row['pat_name'] ?></td>
    <td><?= $row['pat_address'] ?></td>
    <td><?= $row['pat_phoneno'] ?></td>
    <td><?= $row['hosp_add'] ?></td>
    <td><?= $row['b_bank_id'] ?></td>
    <td>
      <a href="update_patient.php?id=<?= $row['pat_id'] ?>">Edit</a> |
      <a href="delete_patient.php?id=<?= $row['pat_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>

<br><br>
<center>
  <button onclick="window.location.href='index.html'" style="
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    width: 150px;
    height: 50px;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;">
    Back to Home
  </button>
</center>
</body>
</html>
<?php $conn->close(); ?>
