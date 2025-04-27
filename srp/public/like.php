<?php
require_once('../config/config.php');
require_once('../private/functions.php');
require_login();

if (isset($_POST['video_id'])) {
    $stmt = $pdo->prepare("INSERT INTO likes (video_id, user_id) VALUES (?, ?)");
    $stmt->execute([
        $_POST['video_id'],
        $_SESSION['user_id']
    ]);
}

header('Location: view.php?id=' . $_POST['video_id']);
exit;
?>
