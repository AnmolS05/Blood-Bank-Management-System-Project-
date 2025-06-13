<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $new_password = password_hash($_POST["new_password"], PASSWORD_DEFAULT);

    $conn = new mysqli("localhost", "root", "", "bloodb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE users SET password=? WHERE username=?");
    $stmt->bind_param("ss", $new_password, $username);
    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo "Password reset successful. <a href='login.html'>Login now</a>";
    } else {
        echo "Username not found or update failed.";
    }

    $conn->close();
}
?>
