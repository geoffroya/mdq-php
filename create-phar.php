<?php
$srcRoot = "./src";
$buildRoot = "./build";

$phar = new Phar(
                $buildRoot . "/mdq-php.phar",
                FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME,
                "mdq-php.phar"
);

$phar->setStub($p->createDefaultStub('mdq.php'));

$phar['mdq.php'] = file_get_contents($srcRoot . 'mdq.php');

$phar->buildFromDirectory($srcRoot . '/lib', '/\.php$/');
$phar->buildFromDirectory($srcRoot . '/vendor', '/\.php$/');
$phar->buildFromDirectory($srcRoot . '/config', '/\.php$/');
