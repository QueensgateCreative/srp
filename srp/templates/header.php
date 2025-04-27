<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pilates Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Pilates Studio</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <?php if (isLoggedIn()): ?>
            <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-4">
