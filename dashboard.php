<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

$theme = $_COOKIE['theme'] ?? 'light';
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-color: <?= $theme === 'dark' ? '#222' : '#fff' ?>;
    color: <?= $theme === 'dark' ? '#fff' : '#000' ?>;
    font-family: Arial;
}
a {
    color: <?= $theme === 'dark' ? '#0ff' : '#00f' ?>;
}
</style>
</head>

<body>
<h2>Welcome, <?= $_SESSION['student_name'] ?> 👋</h2>

<nav>
    <a href="dashboard.php">Dashboard</a> |
    <a href="preference.php">Change Theme</a> |
    <a href="logout.php">Logout</a>
</nav>

<p>This is your student dashboard.</p>
</body>
</html>
