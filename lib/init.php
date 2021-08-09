<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require_once(__DIR__ . '/../vendor/autoload.php');

if (isset($_SERVER{'MDQ_CONFIG'})) {
    require_once($_SERVER{'MDQ_CONFIG'});
} else {
    require_once($topLevelDir . '/etc/mdq-php/config.php');
}

require_once(__DIR__ . '/../lib/functions.php');

// Config init code
ini_set('display_errors', $config['debug'] ? '1' : '0');

$logger = new Logger('mdq');
$logger->pushHandler(new StreamHandler($config['logging']['logFile'], $config['logging']['logLevel']));

