<?php
include 'db_connect.php';

$id = $_GET['id'];

if ($conn->query("DELETE FROM patient WHERE pat_id = '$id'") === TRUE) {
    echo "<script>
        alert('Patient deleted successfully.');
        window.location.href = 'display_patient.php';
    </script>";
} else {
    echo "Error deleting patient: " . $conn->error;
}
$conn->close();
?>
