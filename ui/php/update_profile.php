<?php

session_start();

require_once "../database/database.php";

if (!isset($_SESSION["user_id"])) {

    header("Location: ../pages/login/index.php");
    exit;

}

$fullname = trim($_POST["fullname"]);
$email = trim($_POST["email"]);
$stmt = $pdo->prepare("
    SELECT id
    FROM users
    WHERE email = ?
    AND id != ?
");

$stmt->execute([$email, $_SESSION["user_id"]]);

if($stmt->fetch()){

    header("Location: profile.php?error=Email already exists");
    exit;

}
$stmt = $pdo->prepare("
    UPDATE users
    SET fullname = ?, email = ?
    WHERE id = ?
");

$stmt->execute([
    $fullname,
    $email,
    $_SESSION["user_id"]
]);

$_SESSION["fullname"] = $fullname;
$_SESSION["email"] = $email;

header("Location: profile.php?success=Profile updated successfully");
exit;