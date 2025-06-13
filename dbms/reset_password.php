<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim(htmlspecialchars($_POST["username"])); // Sanitize and trim
    $password = trim($_POST["password"]);  // Sanitize and trim

    // Connect to MySQL
    $conn = new mysqli("localhost", "root", "", "bloodb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the password for the user
    $stmt = $conn->prepare("UPDATE users SET password=? WHERE username=?");
    $stmt->bind_param("ss", $password, $username);
    if ($stmt->execute()) {
        echo "<script>
                alert('Password reset successful!');
                window.location.href='login.html'; // Redirect to login page
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $conn->error . "');
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
