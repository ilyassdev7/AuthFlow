<?php

session_start();

require_once "../database/database.php";

if (!isset($_SESSION["user_id"])) {

    header("Location: ../pages/login/index.php");
    exit;

}

$current = $_POST["current_password"];
$new = $_POST["new_password"];
$confirm = $_POST["confirm_password"];

if ($new !== $confirm) {

    header("Location: profile.php?error=Passwords do not match");
exit;

}

$stmt = $pdo->prepare("
    SELECT password
    FROM users
    WHERE id = ?
");

$stmt->execute([$_SESSION["user_id"]]);

$user = $stmt->fetch();

if (!password_verify($current, $user["password"])) {

    header("Location: profile.php?error=Current password is incorrect");
exit;

}

$newHash = password_hash($new, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("
    UPDATE users
    SET password = ?
    WHERE id = ?
");

$stmt->execute([
    $newHash,
    $_SESSION["user_id"]
]);

header("Location: profile.php?success=Password updated successfully");

exit;