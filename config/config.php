<?php

$config["debug"] = true;

// Logging
$config["logging"] = [
  "logFile" => "./mdq-php.log",
  "logLevel" => Monolog\Logger::DEBUG
];

$config["federation"] = [
  "name" => "test",
  "localPath" => "/usr/local/cache/shibboleth/test/"
];
