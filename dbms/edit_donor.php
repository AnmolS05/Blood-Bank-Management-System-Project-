<?php
$conn = new mysqli("localhost", "root", "", "bloodb");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM donor WHERE donor_id = $id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Donor</title>
  <style>
    body { font-family: Arial; background-color: #fff7e6; text-align: center; padding: 50px; }
    form {
      background: white; padding: 30px; border-radius: 10px;
      box-shadow: 0 0 10px #ccc; display: inline-block;
    }
    input, select, button {
      padding: 10px; margin: 10px; border-radius: 6px;
      font-size: 16px; width: 90%;
    }
    button {
      background-color: crimson; color: white; border: none; cursor: pointer;
    }
    button:hover { background-color: darkred; }
  </style>
</head>
<body>
  <h2>Edit Donor</h2>
  <form action="update_donor.php" method="POST">
    <input type="hidden" name="donor_id" value="<?= $row['donor_id'] ?>">
    <input type="text" name="donor_name" value="<?= $row['donor_name'] ?>" required><br>
    <select name="gender" required>
      <option value="">Select Gender</option>
      <option value="Male" <?= $row['gender']=='Male'?'selected':'' ?>>Male</option>
      <option value="Female" <?= $row['gender']=='Female'?'selected':'' ?>>Female</option>
      <option value="Other" <?= $row['gender']=='Other'?'selected':'' ?>>Other</option>
    </select><br>
    <input type="text" name="donor_address" value="<?= $row['donor_address'] ?>" required><br>
    <input type="date" name="dob" value="<?= $row['dob'] ?>" required><br>
    <input type="number" name="blweight" value="<?= $row['blweight'] ?>" required><br>
    <input type="text" name="phone_no" value="<?= $row['phone_no'] ?>" maxlength="10" required><br>
    <input type="number" name="doctor_id" value="<?= $row['doctor_id'] ?>" required><br>
    <button type="submit">Update</button>
  </form>
</body>
</html>
<?php $conn->close(); ?>
