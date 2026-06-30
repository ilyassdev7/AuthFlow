<?php

require_once "../database/database.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Access denied.");
}

$fullname = trim($_POST["fullname"]);
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);
$confirmPassword = trim($_POST["confirmPassword"]);
if (
    empty($fullname) ||
    empty($email) ||
    empty($password) ||
    empty($confirmPassword)
) {

    die("Please fill in all fields.");

}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    die("Invalid email address.");

}

if (strlen($password) < 6) {

    die("Password must contain at least 6 characters.");

}

if ($password !== $confirmPassword) {

    die("Passwords do not match.");

}
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->rowCount() > 0) {

    die("This email is already registered.");

}
$hashedPassword = password_hash(
    $password,
    PASSWORD_DEFAULT
);
$stmt = $pdo->prepare("
    INSERT INTO users(fullname, email, password)
    VALUES (?, ?, ?)
");

$stmt->execute([
    $fullname,
    $email,
    $hashedPassword
]);
header("Location: ../pages/login/index.php?registered=1");
exit;