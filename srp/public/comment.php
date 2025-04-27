<?php
require_once('../config/config.php');
require_once('../private/functions.php');
require_login();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['video_id'], $_POST['comment'])) {
    $stmt = $pdo->prepare("INSERT INTO comments (video_id, user_id, comment) VALUES (?, ?, ?)");
    $stmt->execute([
        $_POST['video_id'],
        $_SESSION['user_id'],
        $_POST['comment']
    ]);
}

header('Location: view.php?id=' . $_POST['video_id']);
exit;
?>
