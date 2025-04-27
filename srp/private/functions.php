<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isUploader() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'uploader';
}

function isViewer() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'viewer';
}

function isSubscribed() {
    return isset($_SESSION['subscribed']) && $_SESSION['subscribed'] === true;
}
?>
