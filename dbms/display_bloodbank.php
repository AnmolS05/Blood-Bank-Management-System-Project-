<?php
include 'db_connect.php';
$result = $conn->query("SELECT * FROM bloodbank");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blood Bank Records</title>
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

<h2 style="text-align:center;">Blood Bank Records</h2>
<table>
    <tr>
        <th>ID</th><th>Name</th><th>Address</th><th>Donor ID</th><th>Blood ID</th><th>Type</th><th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['b_bank_id'] ?></td>
        <td><?= $row['b_bank_name'] ?></td>
        <td><?= $row['b_bank_address'] ?></td>
        <td><?= $row['donor_id'] ?></td>
        <td><?= $row['bl_id'] ?></td>
        <td><?= $row['bl_type'] ?></td>
        <td>
            <a href="update_bloodbank.php?id=<?= $row['b_bank_id'] ?>">Edit</a> |
            <a href="delete_bloodbank.php?id=<?= $row['b_bank_id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
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
</html>
