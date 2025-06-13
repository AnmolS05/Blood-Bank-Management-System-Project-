<?php
$conn = new mysqli("localhost", "root", "", "bloodb");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql = "INSERT INTO doctor (doctor_id, doctor_name, doctor_address, doctor_ph)
        VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", 
    $_POST['doctor_id'], 
    $_POST['doctor_name'], 
    $_POST['doctor_address'], 
    $_POST['doctor_ph']
);

if ($stmt->execute()) {
    echo "<script>alert('Doctor saved successfully.'); window.location.href='display_doctor.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}
$conn->close();
?>
