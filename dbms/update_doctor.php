<?php
$conn = new mysqli("localhost", "root", "", "bloodb");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = $_GET['id'];
  $row = $conn->query("SELECT * FROM doctor WHERE doctor_id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Doctor</title>
  <style>
    body { font-family: Arial; background: #f8f9fa; text-align: center; padding: 30px; }
    form {
      width: 50%; margin: auto; background: white;
      padding: 30px; border-radius: 10px; box-shadow: 0 0 10px #ccc;
    }
    input, select, button {
      padding: 10px; width: 90%; margin: 10px 0;
      border-radius: 6px; font-size: 16px;
    }
    button {
      background-color: green; color: white; border: none;
    }
    button:hover { background-color: darkgreen; }
  </style>
</head>
<body>
  <h2>Edit Doctor</h2>
  <form method="POST">
    <input type="hidden" name="doctor_id" value="<?= $row['doctor_id'] ?>">
    <input type="text" name="doctor_name" value="<?= $row['doctor_name'] ?>" required>
    <input type="text" name="doctor_address" value="<?= $row['doctor_address'] ?>" required>
    <input type="text" name="doctor_ph" value="<?= $row['doctor_ph'] ?>" required>
    <button type="submit">Update Doctor</button>
  </form>
</body>
</html>
<?php
} else {
  $stmt = $conn->prepare("UPDATE doctor SET doctor_name=?, doctor_address=?, doctor_ph=? WHERE doctor_id=?");
  $stmt->bind_param("sssi",
    $_POST['doctor_name'],
    $_POST['doctor_address'],
    $_POST['doctor_ph'],
    $_POST['doctor_id']
  );
  $stmt->execute();
  echo "<script>alert('Doctor updated successfully.'); window.location.href='display_doctor.php';</script>";
}
$conn->close();
?>
