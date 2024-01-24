<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
require_once 'connection.php';

try {
    // Check connection
    if (!$conn) {
        die("Connection failed");
    }

    $roomid = isset($_GET['roomid']) ? $_GET['roomid'] : '';

    $response = array();

    // Fetch the next video from the playlist
    $sql = "SELECT a.playlistid, a.videoid, CONCAT(b.title,' - ',b.artist) AS playing, c.nextsong,
            (SELECT COUNT(playlistid) - 2 FROM playlist WHERE roomid = :roomid) AS onque
            FROM playlist AS a
            LEFT JOIN songbook AS b ON b.ytid = a.videoid
            LEFT JOIN (
                SELECT CONCAT(b.title,' - ',b.artist) AS nextsong, a.playlistid
                FROM playlist AS a
                LEFT JOIN songbook AS b ON b.ytid = a.videoid
                WHERE roomid = :roomid
                ORDER BY que
                LIMIT 2
            ) AS c ON 1 = 1 AND c.playlistid != a.playlistid
            WHERE roomid = :roomid
            ORDER BY que
            LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':roomid', $roomid);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $playlistId = $result["playlistid"];
        $deletedVideoId = $result["videoid"];
        $nowplaying = $result["playing"];
        $nextsong = $result["nextsong"];
        $songque = $result["onque"];
        
        $deleteSql1 = "
        INSERT INTO playing (roomid, videoid)
        SELECT roomid, videoid FROM playlist WHERE playlistid = :playlistid
        ON DUPLICATE KEY UPDATE
        videoid = VALUES(videoid);";
        $deleteStmt1 = $conn->prepare($deleteSql1);

        if (!$deleteStmt1) {
            die("Prepare failed: " . $conn->error);
        }

        $deleteStmt1->bindValue(":playlistid", $playlistId);
        $deleteResult1 = $deleteStmt1->execute();

        // Prepare and execute the SQL statement to delete the record from the playlist
        $deleteSql = "DELETE FROM playlist WHERE playlistid = :playlistid";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bindValue(':playlistid', $playlistId);
        $deleteResult = $deleteStmt->execute();

        if ($deleteResult === true) {
            $response['playlistId'] = $playlistId;
            $response['deletedVideoId'] = $deletedVideoId;
            $response['nowplaying'] = $nowplaying;
            $response['nextsong'] = $nextsong;
            $response['songque'] = $songque;
        }
    } else {
        $response['playlistId'] = null;
        $response['deletedVideoId'] = "C-a0QzK1DF4";
        $response['nowplaying'] = '';
        $response['nextsong'] = '';
        $response['songque'] = '';
    }

    $stmt->closeCursor();
} catch (PDOException $e) {
    // Handle exceptions and errors
    $response['error'] = $e->getMessage();
}

//$conn = null;

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
