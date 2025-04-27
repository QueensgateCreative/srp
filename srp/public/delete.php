<?php
require_once('../config/config.php');
require_once('../private/functions.php');
require_login();
require_role('uploader');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("UPDATE videos SET deleted_at = NOW() WHERE id = ? AND uploaded_by = ?");
    $stmt->execute([$id, $_SESSION['user_id']]);
}

header('Location: dashboard.php');
exit;
?>
