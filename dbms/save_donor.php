<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "bloodb");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$donor_id = $_POST['donor_id'];
$donor_name = $_POST['donor_name'];
$gender = $_POST['gender'];
$donor_address = $_POST['donor_address'];
$dob = $_POST['dob'];
$blweight = $_POST['blweight'];
$phone_no = $_POST['phone_no'];
$doctor_id = $_POST['doctor_id'];

// Insert into donor table
$sql = "INSERT INTO donor (donor_id, donor_name, gender, donor_address, dob, blweight, phone_no, doctor_id)
        VALUES ('$donor_id', '$donor_name', '$gender', '$donor_address', '$dob', '$blweight', '$phone_no', '$doctor_id')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Donor saved successfully.'); window.location.href='display_donor.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$conn->close();
?>
