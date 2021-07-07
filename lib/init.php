<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$cli = false;
if (php_sapi_name() === 'cli') {
    $cli = true;
    require_once(__DIR__ . '../config/config.php');
} else {
    if (isset($_SERVER{'MDQ_CONFIG'})) {
        require_once($_SERVER{'MDQ_CONFIG'});
    } else {
        require_once($topLevelDir . '/etc/mdq-php/config.php');
    }
}

require_once(__DIR__ . '/../lib/functions.php');

// Config init code
ini_set('display_errors', $config['debug'] ? '1' : '0');

$logger = getLogger("mdq-php");
