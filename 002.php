<?php
//Log File 
class Logging
{
    function log_info()
    {
        $log  = date("Y-m-d H:i:s") . " INFO: " . "This is an information about something." . PHP_EOL;
        file_put_contents("./logging/app" . '.log', $log, FILE_APPEND);
    }
    function log_error()
    {
        $log  = date("Y-m-d H:i:s") . " ERROR: " . "We can't divide any numbers by zero.." . PHP_EOL;
        file_put_contents("./logging/app" . '.log', $log, FILE_APPEND);
    }
    function log_notice()
    {
        $log  = date("Y-m-d H:i:s") . " NOTICE: " . "Someone loves your status." . PHP_EOL;
        file_put_contents("./logging/app" . '.log', $log, FILE_APPEND);
    }
    function log_warning()
    {
        $log  = date("Y-m-d H:i:s") . " WARNING: " . "Insufficient funds." . PHP_EOL;
        file_put_contents("./logging/app" . '.log', $log, FILE_APPEND);
    }
    function log_debug()
    {
        $log  = date("Y-m-d H:i:s") . " DEBUG: " . "This is debug message." . PHP_EOL;
        file_put_contents("./logging/app" . '.log', $log, FILE_APPEND);
    }
    function log_alert()
    {
        $log  = date("Y-m-d H:i:s") . " ALERT: " . " Achtung! Achtung!" . PHP_EOL;
        file_put_contents("./logging/app" . '.log', $log, FILE_APPEND);
    }
    function log_critical()
    {
        $log  = date("Y-m-d H:i:s") . " CRITICAL: " . "Medic!! We've got critical damages." . PHP_EOL;
        file_put_contents("./logging/app" . '.log', $log, FILE_APPEND);
    }
    function log_emergency()
    {
        $log  = date("Y-m-d H:i:s") . " EMERGENCY: " . "System hung. Contact system administrator immediately!." . PHP_EOL;
        file_put_contents("./logging/app" . '.log', $log, FILE_APPEND);
    }
}

$log_ability = new Logging();
$log_ability->log_info();
$log_ability->log_error();
$log_ability->log_notice();
$log_ability->log_warning();
$log_ability->log_debug();
$log_ability->log_alert();
$log_ability->log_critical();
$log_ability->log_emergency();
