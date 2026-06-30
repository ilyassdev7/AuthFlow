<?php

session_start();
require_once "../database/database.php";

if (!isset($_SESSION["user_id"])) {

    header("Location: ../pages/login/index.php");
    exit;

}
// Total Users
$stmt = $pdo->query("SELECT COUNT(*) AS total FROM users");
$totalUsers = $stmt->fetch()["total"];
// Get all users
$stmt = $pdo->query("
    SELECT id, fullname, email, created_at
    FROM users
    ORDER BY id DESC
");

$users = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>


<body>
<button class="menu-toggle" id="menuToggle">
    ☰
</button>
<div class="dashboard">

    <aside class="sidebar">

        <div class="logo">

            ⚡ AuthFlow

        </div>

        <nav>

           <a href="#" class="active">
    <i class="fa-solid fa-house"></i>
    Dashboard
</a>

<a href="profile.php">
    <i class="fa-solid fa-user"></i>
    Profile
</a>

<a href="#">
    <i class="fa-solid fa-gear"></i>
    Settings
</a>

<a href="logout.php">
    <i class="fa-solid fa-right-from-bracket"></i>
    Logout
</a>

        </nav>

    </aside>

    <main class="content">

        <header class="topbar">

    <div>

        <h2>
            Welcome,
            <?= htmlspecialchars($_SESSION["fullname"]) ?>
        </h2>

        <p>Have a productive day 🚀</p>

    </div>

    <div class="top-actions">

       <input
    type="text"
    placeholder="Search users..."
    class="search-box"
    id="searchUser"
>

        <button id="themeToggle" class="notify">

    <i class="fa-solid fa-moon"></i>

</button>
        <button class="notify">

            <i class="fa-solid fa-bell"></i>

        </button>

        <div class="avatar">

            <?= strtoupper(substr($_SESSION["fullname"],0,1)) ?>

        </div>

    </div>

</header>
        <section class="stats">

    <div class="stat-card">

        <span class="icon"><i class="fa-solid fa-users"></i></span>

       <h3><?= $totalUsers ?></h3>
<p>Total Users</p>

    </div>

    <div class="stat-card">

        <span class="icon"><i class="fa-solid fa-dollar-sign"></i></span>

        <h3>$24,500</h3>

        <p>Revenue</p>

    </div>

    <div class="stat-card">

        <span class="icon"><i class="fa-solid fa-box"></i></span>

        <h3>325</h3>

        <p>Orders</p>

    </div>

    <div class="stat-card">

        <span class="icon"><i class="fa-solid fa-chart-line"></i></span>

        <h3>+18%</h3>

        <p>Growth</p>

    </div>

</section>
<section class="dashboard-grid">

    <div class="analytics">

        <div class="section-title">

            <h3>Analytics</h3>

            <span>This Month</span>

        </div>

       <div class="chart-container">

    <canvas id="usersChart"></canvas>

</div>

    </div>

    <div class="activity">

        <div class="section-title">

            <h3>Recent Activity</h3>

        </div>

        <ul>

            <li>✅ New user registered</li>

            <li><i class="fa-solid fa-dollar-sign"></i> New payment received</li>

            <li><i class="fa-solid fa-box"></i> Order #254 completed</li>

            <li>⚙️ Settings updated</li>

            <li>🔒 Password changed</li>

        </ul>

    </div>

</section>
<section class="orders">

    <div class="section-title">

        <h3>Latest Orders</h3>

        <span>View All</span>

    </div>

    <table id="usersTable">

        <thead>

            <tr>

                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Created At</th>

            </tr>

        </thead>

       <tbody>

<tbody>

<?php if(count($users) > 0): ?>

    <?php foreach($users as $user): ?>

    <tr>

        <td><?= $user["id"] ?></td>

        <td><?= htmlspecialchars($user["fullname"]) ?></td>

        <td><?= htmlspecialchars($user["email"]) ?></td>

        <td><?= $user["created_at"] ?></td>

    </tr>

    <?php endforeach; ?>

<?php else: ?>

    <tr>

        <td colspan="4" style="text-align:center;padding:30px;">
            No users found.
        </td>

    </tr>

<?php endif; ?>

</tbody>

</tbody>

    </table>

</section>

    </main>

</div>
<div id="toast" class="toast"></div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../assets/js/dashboard.js"></script>
</body>

</html>