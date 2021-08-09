<?php

function endsWith($string, $endString)
{
    $len = strlen($endString);
    if ($len == 0) {
        return true;
    }
    return (substr($string, -$len) === $endString);
}

function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

function do_log($level, $msg)
{
    #echo "[".$level."] ".$msg;
    error_log("[".$level."] ".$msg);
}
function debug($msg)
{
    do_log("DEBUG", $msg);
}
function error($msg)
{
    do_log("ERROR", $msg);
}
function warn($msg)
{
    do_log("WARN", $msg);
}
function info($msg)
{
    do_log("INFO", $msg);
}
