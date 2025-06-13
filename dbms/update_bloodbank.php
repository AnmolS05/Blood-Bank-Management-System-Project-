<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM bloodbank WHERE b_bank_id = '$id'");
    $row = $result->fetch_assoc();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['b_bank_id'];
    $name = $_POST['b_bank_name'];
    $address = $_POST['b_bank_address'];
    $donor_id = $_POST['donor_id'];
    $bl_id = $_POST['bl_id'];
    $bl_type = $_POST['bl_type'];

    $sql = "UPDATE bloodbank SET 
        b_bank_name = '$name', 
        b_bank_address = '$address',
        donor_id = '$donor_id',
        bl_id = '$bl_id',
        bl_type = '$bl_type'
        WHERE b_bank_id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Blood Bank updated successfully.'); window.location.href='display_bloodbank.php';</script>";
    } else {
        echo "Error updating blood bank: " . $conn->error;
    }
    exit();
}
?>
