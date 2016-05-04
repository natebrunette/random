<?php

define('ROOT', __DIR__ . '/..');

require_once ROOT . '/vendor/autoload.php';

$app = new \Tebru\Random\RandomApplication('Random', '@package_version@');
$app->run();
