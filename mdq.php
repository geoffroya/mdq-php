<?php

include(__DIR__ . '/lib/init.php');

// 1- check received request
//    * Must contain entityID attribute (URL encoded)
//    * If not provided, must must provide all the entities (ie MD file)
//    * Check accept is "application/samlmetadata+xml"
if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    $logger->error("Non GET method");
    http_response_code(405);
    exit("Non supported method");
}
if ($_SERVER['HTTP_ACCEPT'] == "application/samlmetadata+xml") {
    $logger->error("Unsupported accept value: ".$_SERVER['HTTP_ACCEPT']);
    http_response_code(406);
    exit("Unsupported accept value: ".$_SERVER['HTTP_ACCEPT']);
}

// 2- Decode entityID

$logger->debug("Path Info = ".$_SERVER['PATH_INFO']);

if (endsWith($_SERVER['PATH_INFO'], "/entities")) {
    $logger->debug("Requesting all entities - NOT SUPPORTED");
    http_response_code(500);
    exit("Requesting all entities - NOT SUPPORTED YET");
}

// 3- Compute hash (lower-case hex-encoded SHA-1 digest of the entityID)

// 4- Check if file exists

// 5- Return the file
