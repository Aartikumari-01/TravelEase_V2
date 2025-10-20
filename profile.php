<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}
?>

<h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>
<p>You are logged in as <?php echo $_SESSION['user_id']; ?>.</p>
<a href="my_bookings.php">View My Bookings</a>
