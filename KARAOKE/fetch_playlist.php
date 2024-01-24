<?php
require_once 'connection.php';

$roomid = $_POST['roomid'];

$query = "SELECT 0 Que,upper(Title) Title,upper(Artist) Artist FROM playing as a
left join songbook as b on b.ytid = a.videoid where a.roomid = :roomid
union
select Que,upper(Title) Title,upper(Artist) Artist from playlist as a
left join songbook as b on b.ytid = a.videoid where a.roomid = :roomid
order by que";
$stmt = $conn->prepare($query);
$stmt->bindParam(':roomid', $roomid);
$stmt->execute();
$playing = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return the playing data as JSON
echo json_encode($playing);
?>