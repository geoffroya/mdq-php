<?php

$config["debug"] = true;

// Logging
$config["logging"] = [
  "logFile" => "/var/log/mdq-php.log",
  "logLevel" => Monolog\Logger::DEBUG
];

$config["federation"] = [
  "name" => "test",
  "localPath" => "/var/cache/shibboleth/test"
];
