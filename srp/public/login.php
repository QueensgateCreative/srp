<?php
require_once('../config/config.php');
require_once('../private/functions.php');
require_once('../templates/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['subscribed'] = $user['subscribed'];
        header('Location: index.php');
        exit;
    } else {
        $error = "Invalid login credentials.";
    }
}
?>

<h1>Login</h1>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<form method="POST">
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

<?php require_once('../templates/footer.php'); ?>
