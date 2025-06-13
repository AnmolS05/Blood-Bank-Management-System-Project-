<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Login Process
    $username = trim(htmlspecialchars($_POST["username"]));
    $password = trim($_POST["password"]);  // Plain text password (no hashing)

    // Connect to MySQL
    $conn = new mysqli("localhost", "root", "", "bloodb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the plain text password for the given username
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $stored_password);
        $stmt->fetch();

        // Compare entered password (plain text) with stored password (plain text)
        if ($password === $stored_password) {
            // Password is correct, start the session and set user info
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;

            // Regenerate session ID for security
            session_regenerate_id(true);

            // Redirect to main page (dashboard or home page)
            header("Location: index.html");
            exit();
        } else {
            // Password is incorrect
            echo "<script>alert('Invalid username or password.');</script>";
        }
    } else {
        // Username doesn't exist
        echo "<script>alert('Invalid username or password.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f9f9f9; }
        .form-container { width: 300px; margin: 50px auto; padding: 30px; background-color: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        input { width: 100%; padding: 10px; margin: 10px 0; border-radius: 4px; border: 1px solid #ccc; }
        button { width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
