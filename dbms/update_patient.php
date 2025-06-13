<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM patient WHERE pat_id = '$id'");
    $row = $result->fetch_assoc();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['pat_id'];
    $name = $_POST['pat_name'];
    $address = $_POST['pat_address'];
    $phone = $_POST['pat_phoneno'];
    $hosp = $_POST['hosp_add'];
    $b_bank_id = $_POST['b_bank_id'];

    $sql = "UPDATE patient SET 
        pat_name = '$name', 
        pat_address = '$address',
        pat_phoneno = '$phone',
        hosp_add = '$hosp',
        b_bank_id = '$b_bank_id'
        WHERE pat_id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Patient updated successfully.'); window.location.href='display_patient.php';</script>";
    } else {
        echo "Error updating patient: " . $conn->error;
    }
    exit();
}
?>
