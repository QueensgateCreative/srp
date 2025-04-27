<?php
// Database configuration
$host = 'localhost'; // or your host
$dbname = 'pilates_studio';
$username = 'your_db_username';
$password = 'your_db_password';

// PayPal config
$paypal_client_id = 'your_paypal_client_id_here';
$paypal_plan_id = 'your_paypal_subscription_plan_id_here';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
