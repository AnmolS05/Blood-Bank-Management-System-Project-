<?php
include 'db_connect.php';

$id = $_GET['id'];

if ($conn->query("DELETE FROM bloodbank WHERE b_bank_id = '$id'") === TRUE) {
    echo "<script>
        alert('Blood Bank deleted successfully.');
        window.location.href = 'display_bloodbank.php';
    </script>";
} else {
    echo "Error deleting blood bank: " . $conn->error;
}

$conn->close();
?>
