<?php

//homepage for the consumer

require __DIR__ . '/navbar.php';
require_once __DIR__ . '/../middleware/authenticate.php';

Authenticate::requireConsumer();

?>

<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato'>
        <link rel="stylesheet" href="../css/site.css">
    </head>
	<body>
		<main class="container mt-3">
            <h2 class="text-center" style="font-family: lato; font-weight: bold; margin-top: 30px">Welcome to your Complaint Management System!</h2>
    </body>
</html>