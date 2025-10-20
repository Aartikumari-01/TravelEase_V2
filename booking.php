<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $hotel_name = $_POST['hotel_name'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $guests = $_POST['guests'];
    $room_type = $_POST['room_type'];

    $sql = "INSERT INTO bookings (user_id, hotel_name, check_in, check_out, guests, room_type)
            VALUES ('$user_id', '$hotel_name', '$check_in', '$check_out', '$guests', '$room_type')";
    if ($conn->query($sql)) {
        $message = "Booking confirmed successfully!";
    } else {
        $message = "Error while booking.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Book Hotel - DreamStay</title><link rel="stylesheet" href="style.css"></head>
<body>
<?php include 'nav.php'; ?>
<h2>Book Your Stay</h2>
<p><?= $message ?></p>
<form method="POST">
    <input type="text" name="hotel_name" placeholder="Hotel Name" required><br>
    <label>Check-in:</label><input type="date" name="check_in" required><br>
    <label>Check-out:</label><input type="date" name="check_out" required><br>
    <input type="number" name="guests" placeholder="Number of Guests" required><br>
    <select name="room_type" required>
        <option value="">Select Room Type</option>
        <option value="Single">Single</option>
        <option value="Double">Double</option>
        <option value="Suite">Suite</option>
    </select><br>
    <button type="submit">Book Now</button>
</form>
</body>
</html>
