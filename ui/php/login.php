<?php

session_start();

require_once "../database/database.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    exit("Access denied.");

}

$email = trim($_POST["email"]);
$password = trim($_POST["password"]);

if (empty($email) || empty($password)) {

    die("Please fill in all fields.");

}
$stmt = $pdo->prepare("
    SELECT * FROM users
    WHERE email = ?
");

$stmt->execute([$email]);

$user = $stmt->fetch();

if (!$user) {

    die("Email or password is incorrect.");

}
if (!password_verify($password, $user["password"])) {

    die("Email or password is incorrect.");

}
$_SESSION["user_id"] = $user["id"];
$_SESSION["fullname"] = $user["fullname"];
$_SESSION["email"] = $user["email"];
header("Location: ../php/dashboard.php");
exit;