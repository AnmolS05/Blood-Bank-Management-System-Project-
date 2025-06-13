<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $b_bank_id = $_POST['b_bank_id'];
    $b_bank_name = $_POST['b_bank_name'];
    $b_bank_address = $_POST['b_bank_address'];
    $donor_id = $_POST['donor_id'];
    $bl_id = $_POST['bl_id'];
    $bl_type = $_POST['bl_type'];

    $sql = "INSERT INTO bloodbank (b_bank_id, b_bank_name, b_bank_address, donor_id, bl_id, bl_type) 
            VALUES ('$b_bank_id', '$b_bank_name', '$b_bank_address', '$donor_id', '$bl_id', '$bl_type')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Bloodbank saved successfully.'); window.location.href='display_bloodbank.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Save Blood Bank</title>
    <style>
        body { font-family: Arial; background: #f4f6f8; padding: 20px; }
        form { max-width: 400px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
        input[type="text"], input[type="number"], input[type="submit"] {
            width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #28a745; color: white; border: none; cursor: pointer;
        }
        input[type="submit"]:hover { background-color: #218838; }
    </style>
</head>
<body>


</body>
</html>
