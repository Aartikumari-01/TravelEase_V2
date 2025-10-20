<?php
include 'db.php';
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($check->num_rows > 0) {
        $message = "Email already registered.";
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if ($conn->query($sql)) {
            $message = "Registration successful! <a href='login.php'>Login now</a>";
        } else {
            $message = "Error creating account.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Sign Up - DreamStay</title><link rel="stylesheet" href="style.css"></head>
<body>
<?php include 'nav.php'; ?>
<h2>Create Your Account</h2>
<p><?= $message ?></p>
<form method="POST">
    <input type="text" name="name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email Address" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Sign Up</button>
</form>
</body>
</html>
