<?php
$conn = new mysqli("localhost", "root", "", "bloodb");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['donor_id'];
$name = $_POST['donor_name'];
$gender = $_POST['gender'];
$address = $_POST['donor_address'];
$dob = $_POST['dob'];
$weight = $_POST['blweight'];
$phone = $_POST['phone_no'];
$doctor_id = $_POST['doctor_id'];

$sql = "UPDATE donor SET 
  donor_name='$name',
  gender='$gender',
  donor_address='$address',
  dob='$dob',
  blweight='$weight',
  phone_no='$phone',
  doctor_id='$doctor_id'
  WHERE donor_id=$id";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Donor updated successfully.'); window.location.href='display_donor.php';</script>";
} else {
  echo "Error updating donor: " . $conn->error;
}

$conn->close();
?>
