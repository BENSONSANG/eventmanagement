<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Your existing events.php content goes here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVENTS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
$conn = new mysqli("localhost", "root", "", "event_management");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $venue = $_POST['venue'];
    $available_tickets = $_POST['available_tickets'];

    $sql = "INSERT INTO events (title, description, date, venue, available_tickets) 
            VALUES ('$title', '$description', '$date', '$venue', '$available_tickets')";
    if ($conn->query($sql)) {
        echo "Event added!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<form method="POST" action="events.php">
    <h1>Add Event</h1>
    <input type="text" name="title" placeholder="Event Title" required>
    <textarea name="description" placeholder="Event Description" required></textarea>
    <input type="date" name="date" required>
    <input type="text" name="venue" placeholder="Venue" required>
    <input type="number" name="available_tickets" placeholder="Available Tickets" required>
    <button type="submit">Add Event</button>
</form>
<a href="index.php">BACK MENU</a>
</body>
</html>
