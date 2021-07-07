<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

function getLogger($loggerName)
{
    global $config;
    // Logging setup
    $logger = new Logger($loggerName);
    $logger->pushHandler(new StreamHandler($config["logging"]["logFile"], $config["logging"]["logLevel"]));

    return $logger;
}
