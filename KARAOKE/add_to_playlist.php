<?php
// Assuming you have a database connection established
require_once 'connection.php';

// Get the YouTube ID and room ID from the AJAX request
$ytid = $_POST['ytid'];
$roomid = $_POST['roomid'];

try {
    // Get the maximum que value for the given room ID
    $query = "SELECT MAX(que) AS max_que FROM playlist WHERE roomid = :roomid";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':roomid', $roomid);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $maxQue = $result['max_que'];

    // Increment the maximum que value by 1
    $newQue = $maxQue + 1;

    // Prepare and execute the SQL statement to insert the new song into the playlist table
    $query = "INSERT INTO playlist (videoid, que, roomid) VALUES (:ytid, :que, :roomid)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':ytid', $ytid);
    $stmt->bindParam(':que', $newQue);
    $stmt->bindParam(':roomid', $roomid);
    $stmt->execute();

    echo "Successfully added to playlist!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
