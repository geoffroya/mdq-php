<?php

include(__DIR__ . '/lib/init.php');

global $logger;

// 1- check received request
//    * Must contain entityID attribute (URL encoded)
//    * If not provided, must must provide all the entities (ie MD file)
//    * Check accept is "application/samlmetadata+xml"
if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    $logger->addError("Non GET method");

    http_response_code(405);
    exit("Non supported method");
}
if ($_SERVER['HTTP_ACCEPT'] != "application/samlmetadata+xml") {
    $logger->addError("Unsupported accept value: ".$_SERVER['HTTP_ACCEPT']);
    http_response_code(406);
    exit("Unsupported accept value: ".$_SERVER['HTTP_ACCEPT']);
}

// 2- Decode entityID

$logger->addDebug("Path Info = ".$_SERVER['PATH_INFO']);
if (!isset($_SERVER['PATH_INFO']) || !startsWith($_SERVER['PATH_INFO'], "/entities")) {
    http_response_code(400);
    exit('Bad request');
}
if (endsWith($_SERVER['PATH_INFO'], "/entities")) {
    $mdFile = $config["federation"]["localPath"] ."/". $config["federation"]["metadataFile"];
} else {
    $index = strpos($_SERVER['PATH_INFO'], "/entities/");
    $entityId = urldecode(substr($_SERVER['PATH_INFO'], $index + 10));

    // 3- Compute hash (lower-case hex-encoded SHA-1 digest of the entityID)
    $mdFile = $config["federation"]["localPath"] ."/". sha1($entityId) . ".xml";
    $logger->addDebug("Requested entity ID: ".$entityId." / mdFile: ".$mdFile);
    // 4- Check if file exists
    if(!file_exists($mdFile)) {
        http_response_code(404);
        exit("Unkonwn entityID ".$entityId);
    }
}
// 5- Return the file

header('Content-Type: application/samlmetadata+xml');
http_response_code(200);
echo file_get_contents($mdFile);
