<?php
$conn = new mysqli("localhost", "root", "", "bloodb");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM donor");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Donor Records</title>
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

  <h2>Donor Records</h2>

  <table>
    <tr>
      <th>ID</th><th>Name</th><th>Gender</th><th>Address</th><th>DOB</th><th>Weight</th><th>Phone</th><th>Doctor ID</th><th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['donor_id'] ?></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['gender'] ?></td>
      <td><?= $row['address'] ?></td>
      <td><?= $row['dob'] ?></td>
      <td><?= $row['weight'] ?></td>
      <td><?= $row['phone'] ?></td>
      <td><?= $row['doctor_id'] ?></td>
      <td>
        <a href="edit_donor.php?id=<?= $row['donor_id'] ?>">Edit</a> |
        <a href="delete_donor.php?id=<?= $row['donor_id'] ?>" onclick="return confirm('Delete this donor?')">Delete</a>
      </td>
    </tr>
    <?php } ?>
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
