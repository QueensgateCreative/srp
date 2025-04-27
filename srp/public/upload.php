<?php
require_once('../config/config.php');
require_once('../private/functions.php');
require_login();
require_role('uploader');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $tags = $_POST['tags'];

    // Handle file uploads
    $video = $_FILES['video'];
    $thumbnail = $_FILES['thumbnail'];

    if ($video['type'] !== 'video/mp4') {
        $error = "Only MP4 files are allowed.";
    } else {
        $video_name = uniqid() . '_' . basename($video['name']);
        move_uploaded_file($video['tmp_name'], 'uploads/videos/' . $video_name);

        $thumbnail_name = uniqid() . '_' . basename($thumbnail['name']);
        move_uploaded_file($thumbnail['tmp_name'], 'uploads/thumbnails/' . $thumbnail_name);

        $stmt = $pdo->prepare("INSERT INTO videos (title, description, duration, tags, video_file, thumbnail, uploaded_by) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $description, $duration, $tags, $video_name, $thumbnail_name, $_SESSION['user_id']]);

        header('Location: dashboard.php');
        exit;
    }
}

require_once('../templates/header.php');
?>

<h1>Upload New Video</h1>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
