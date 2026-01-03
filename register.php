<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO students (student_id, name, password_hash)
        VALUES (:student_id, :name, :password_hash)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'student_id' => $student_id,
    'name' => $name,
    'password_hash' => $passwordHash
]);



    header("Location: login.php");
    exit();
}
?>

<h2>Register</h2>
<form method="POST">
    Student ID: <input type="text" name="student_id" required><br><br>
    Name: <input type="text" name="name" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
</form>
