<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pat_id = $_POST['pat_id'];
    $pat_name = $_POST['pat_name'];
    $pat_address = $_POST['pat_address'];
    $pat_phoneno = $_POST['pat_phoneno'];
    $hosp_add = $_POST['hosp_add'];
    $b_bank_id = $_POST['b_bank_id'];

    $sql = "INSERT INTO patient (pat_id, pat_name, pat_address, pat_phoneno, hosp_add, b_bank_id)
            VALUES ('$pat_id', '$pat_name', '$pat_address', '$pat_phoneno', '$hosp_add', '$b_bank_id')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Patient saved successfully.'); window.location.href='display_patient.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
