<?php
require_once('../config/config.php');
require_once('../private/functions.php');
require_once('../templates/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = $pdo->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
    $stmt->execute([$email, $password, $role]);

    header('Location: login.php');
    exit;
}
?>

<h1>Register</h1>

<form method="POST">
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-control" required>
            <option value="viewer">Viewer</option>
            <option value="uploader">Uploader</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Register</button>
</form>

<?php require_once('../templates/footer.php'); ?>
