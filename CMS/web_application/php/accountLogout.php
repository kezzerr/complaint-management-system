<?php

//webpage which allows the user to logout of their account

require __DIR__ . '/../src/views/navbar.php';
require_once __DIR__ . '/../src/controllers/logout.php';

$controller = new LogoutController();
$controller->handleLogout();

?>



<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato'>
        <link rel="stylesheet" href="../css/site.css">
    </head>
    <body>
        <div class="container mt-5 text-center">
                <form method="post">
                    <button type="submit" name="logout" class="btn btn-danger btn-sm shadow-sm" style="margin-top:-20px">Logout</button>
                </form>
        </div>
    </body>
</html>
