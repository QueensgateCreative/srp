<?php
require_once('../config/config.php');
require_once('../private/functions.php');
require_once('../templates/header.php');

$stmt = $pdo->query("SELECT * FROM videos WHERE deleted_at IS NULL ORDER BY created_at DESC");
$videos = $stmt->fetchAll();
?>

<h1>Browse Pilates Videos</h1>

<div class="row">
<?php foreach ($videos as $video): ?>
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="uploads/thumbnails/<?= htmlspecialchars($video['thumbnail']) ?>" class="card-img-top" alt="Thumbnail">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($video['title']) ?></h5>
                <p class="card-text"><?= htmlspecialchars($video['description']) ?></p>
                <p><small>Duration: <?= htmlspecialchars($video['duration']) ?> mins</small></p>
                <a href="view.php?id=<?= $video['id'] ?>" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>

<?php require_once('../templates/footer.php'); ?>
