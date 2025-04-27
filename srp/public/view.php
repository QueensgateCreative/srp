<?php
require_once('../config/config.php');
require_once('../private/functions.php');

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM videos WHERE id = ? AND deleted_at IS NULL");
$stmt->execute([$id]);
$video = $stmt->fetch();

if (!$video) {
    die('Video not found.');
}

require_once('../templates/header.php');
?>

<h1><?= htmlspecialchars($video['title']) ?></h1>

<?php if (!is_subscribed()): ?>
    <div class="alert alert-warning">
        You need to subscribe to view this video.
        <a href="subscribe.php" class="btn btn-primary">Subscribe Now</a>
    </div>
<?php else: ?>
    <video width="100%" controls>
        <source src="uploads/videos/<?= htmlspecialchars($video['video_file']) ?>" type="video/mp4">
        Your browser does not support video playback.
    </video>
    <p><?= htmlspecialchars($video['description']) ?></p>
<?php endif; ?>

<?php require_once('../templates/footer.php'); ?>
