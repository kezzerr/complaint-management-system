<?php

//application entry point

require_once __DIR__ . '/../src/controllers/homeCont.php';

$controller = new HomeController();
$controller->showHome();

?>