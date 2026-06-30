<?php

session_start();

require_once "../database/database.php";

if (!isset($_SESSION["user_id"])) {

    header("Location: ../pages/login/index.php");
    exit;

}

$stmt = $pdo->prepare("
    SELECT fullname, email
    FROM users
    WHERE id = ?
");

$stmt->execute([$_SESSION["user_id"]]);

$user = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Profile</title>

    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>

<div class="dashboard">

    <aside class="sidebar">

        <div class="logo">⚡ AuthFlow</div>

        <nav>

            <a href="dashboard.php">Dashboard</a>

            <a href="profile.php" class="active">Profile</a>

            <a href="#">Settings</a>

            <a href="logout.php">Logout</a>

        </nav>

    </aside>

    <main class="content">

        <h2>My Profile</h2>

<div class="profile-card">

    <form action="update_profile.php" method="POST">

        <div class="input-group">

            <label>Full Name</label>

            <input
                type="text"
                name="fullname"
                value="<?= htmlspecialchars($user["fullname"]) ?>"
                required
            >

        </div>
        <div class="profile-card">

    <h2 style="margin-bottom:25px;">Change Password</h2>

    <form action="change_password.php" method="POST">

        <div class="input-group">

            <label>Current Password</label>

            <input
                type="password"
                name="current_password"
                required
            >

        </div>

        <div class="input-group">

            <label>New Password</label>

            <input
                type="password"
                name="new_password"
                required
            >

        </div>

        <div class="input-group">

            <label>Confirm Password</label>

            <input
                type="password"
                name="confirm_password"
                required
            >

        </div>

        <button class="save-btn">

            Update Password

        </button>

    </form>

</div>

        <div class="input-group">

            <label>Email</label>

            <input
                type="email"
                name="email"
                value="<?= htmlspecialchars($user["email"]) ?>"
                required
            >

        </div>

        <button type="submit" class="save-btn">

            Save Changes

        </button>

    </form>

</div>

    </main>

</div>
<div id="toast" class="toast"></div>

<script src="../assets/js/dashboard.js"></script>
</body>

</html>