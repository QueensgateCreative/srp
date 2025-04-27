<?php
require_once('../config/config.php');
require_once('../private/functions.php');
require_login();
require_role('uploader');

$stmt = $pdo->prepare("SELECT * FROM videos WHERE uploaded_by = ? AND deleted_at IS NULL ORDER BY created_at DESC");
$stmt->execute([$_SESSION['user_id']]);
$videos = $stmt->fetchAll();

require_once('../templates/header.php');
?>

<h1>My Uploaded Videos</h1>

<a href="upload.php" class="btn btn-success mb-3">Upload New Video</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>Duration</th>
            <th>Tags</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($videos as $video): ?>
        <tr>
            <td><img src="uploads/thumbnails/<?= htmlspecialchars($video['thumbnail']) ?>" width="100"></td>
            <td><?= htmlspecialchars($video['title']) ?></td>
            <td><?= htmlspecialchars($video['duration']) ?> mins</td>
            <td><?= htmlspecialchars($video['tags']) ?></td>
            <td>
                <a href="delete.php?id=<?= $video['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require_once('../templates/footer.php'); ?>
