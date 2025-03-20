<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEEDBACK</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
session_start(); // Start the session
$conn = new mysqli("localhost", "root", "", "event_management");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        die("Login required!");
    }

    $user_id = $_SESSION['user_id'];
    $event_id = $_POST['event_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Ensure the rating column exists in the feedback table
    $sql = "INSERT INTO feedback (user_id, event_id, rating, comment) VALUES ('$user_id', '$event_id', '$rating', '$comment')";
    if ($conn->query($sql)) {
        echo "Feedback submitted!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<form method="POST" action="feedback.php">
    <input type="hidden" name="event_id" value="1"> <!-- Change dynamically -->
    <select name="rating">
        <option value="1">1 - Poor</option>
        <option value="2">2 - Fair</option>
        <option value="3">3 - Good</option>
        <option value="4">4 - Very Good</option>
        <option value="5">5 - Excellent</option>
    </select>
    <textarea name="comment" placeholder="Write a review"></textarea>
    <button type="submit">Submit Feedback</button>
</form>
<a href="index.php">BACK MENU</a>
</body>
</html>
