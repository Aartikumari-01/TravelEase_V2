<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM bookings WHERE user_id='$user_id'");
?>
<!DOCTYPE html>
<html>
<head><title>My Bookings - DreamStay</title><link rel="stylesheet" href="style.css"></head>
<body>
<?php include 'nav.php'; ?>
<h2>Your Hotel Bookings</h2>
<table border="1" cellpadding="8">
<tr><th>Hotel</th><th>Check-in</th><th>Check-out</th><th>Guests</th><th>Room Type</th></tr>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
  <td><?= htmlspecialchars($row['hotel_name']) ?></td>
  <td><?= htmlspecialchars($row['check_in']) ?></td>
  <td><?= htmlspecialchars($row['check_out']) ?></td>
  <td><?= htmlspecialchars($row['guests']) ?></td>
  <td><?= htmlspecialchars($row['room_type']) ?></td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
