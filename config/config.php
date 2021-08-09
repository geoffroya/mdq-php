<?php

use Monolog\Logger;

$config["debug"] = false;

// Logging
$config["logging"] = [
  "logFile" => "/var/log/mdq-php/mdq-php.log",
  "logLevel" => Monolog\Logger::DEBUG
];
$config["federation"] = [
  "name" => "test",
  "localPath" => "/var/cache/shibboleth/test",
  "metadataFile" => "metadata.xml"
];
