<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Reports</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .center-table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 80%;
        }
        .center-table th, .center-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .center-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "event_management")

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch event details along with user details who booked the tickets and gave feedback
$events_sql = "SELECT e.id, e.title, e.date, e.venue, 
                      u.name AS booking_user_name, 
                      COUNT(b.id) AS bookings, 
                      AVG(f.rating) AS avg_rating, 
                      f.comment, 
                      fu.name AS feedback_user_name
               FROM events e
               LEFT JOIN bookings b ON e.id = b.event_id
               LEFT JOIN users u ON b.user_id = u.id
               LEFT JOIN feedback f ON e.id = f.event_id
               LEFT JOIN users fu ON f.user_id = fu.id
               GROUP BY e.id, f.id";
$events_result = $conn->query($events_sql);

if ($events_result->num_rows > 0) {
    echo "<h1>Event Reports</h1>";
    echo "<table class='center-table'>
            <tr>
                <th>Event Name</th>
                <th>Date</th>
                <th>Venue</th>
                <th>Booking User Name</th>
                <th>Number of Bookings</th>
                <th>Average Rating</th>
                <th>Feedback Comment</th>
                <th>Feedback User Name</th>
            </tr>";
    while ($row = $events_result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['title'] . "</td>
                <td>" . $row['date'] . "</td>
                <td>" . $row['venue'] . "</td>
                <td>" . $row['booking_user_name'] . "</td>
                <td>" . $row['bookings'] . "</td>
                <td>" . number_format($row['avg_rating'], 2) . "</td>
                <td>" . $row['comment'] . "</td>
                <td>" . $row['feedback_user_name'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No events found.";
}

$conn->close();
?>
 <a href="index.php">BACK MENU</a>
</body>
</html>