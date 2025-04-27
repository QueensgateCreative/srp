<?php
require_once('../config/config.php');
require_once('../private/functions.php');
require_login();

$stmt = $pdo->prepare("UPDATE users SET subscribed = 1 WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);

$_SESSION['subscribed'] = 1;

header('Location: dashboard.php');
exit;
?>
