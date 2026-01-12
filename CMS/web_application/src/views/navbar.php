<?php

//handles navigation bar display based on which user is logged in

if (!isset($_SESSION)) session_start();
$role = $_SESSION['role'] ?? '';
$currentPage = basename($_SERVER['PHP_SELF']);

?>

<nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark" style="min-height: 75px;">
    <div class="container-fluid">
        <div style="font-family: Lato;">
            <ul class="navbar-nav me-auto">
                <?php if ($currentPage !== 'index.php'): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="
                        <?php 
                            echo match($role) {
                                'help desk agent' => 'home.php',
                                'consumer' => 'home.php',
                                default => 'index.php'
                            };
                        ?>">
                        Complaint Management System</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item" style="visibility: hidden;">
                        <a class="nav-link fw-bold">&nbsp;</a>
                    </li>
                <?php endif; ?>

                <?php if ($role === 'help desk agent'): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="filterProblems.php">Filter Problems</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="filterAccounts.php">Filter Users</a>
                    </li>
                <?php endif; ?>

                <?php if ($role === 'consumer'): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="submitProb.php">Submit Problem</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <?php if ($role): ?>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="accountLogout.php" aria-label="Account Settings">
                    <img src="../images/avatar.png" id="icon" alt="avatar" style="height:40px; width:40px; border-radius:50%;">
                </a>
            </li>
        </ul>
        <?php endif; ?>
    </div>
</nav>

<nav class="navbar navbar-expand-sm fixed-bottom navbar-light bg-dark">
    <div class="container-fluid justify-content-center">
        <p style="font-family: Lato; color: white; margin-bottom: 0px">Alex Kerry © - 2025</p>
    </div>
</nav>