<?php
$conn = new mysqli("localhost", "root", "", "bloodb");
$result = $conn->query("SELECT * FROM doctor");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Doctor List</title>
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
  <h2>Doctor Records</h2>
  <table>
    <tr>
      <th>ID</th><th>Name</th><th>Address</th><th>Phone</th><th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['doctor_id'] ?></td>
      <td><?= $row['doctor_name'] ?></td>
      <td><?= $row['doctor_address'] ?></td>
      <td><?= $row['doctor_ph'] ?></td>
      <td>
        <a href="update_doctor.php?id=<?= $row['doctor_id'] ?>">Edit</a> |
        <a href="delete_doctor.php?id=<?= $row['doctor_id'] ?>" onclick="return confirm('Delete this doctor?')">Delete</a>
      </td>
    </tr>
    <?php } ?>
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
<?php $conn->close(); ?>
