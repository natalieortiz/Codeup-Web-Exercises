<?php 

require_once 'log.php';

$log = new Log();

echo $log->logMessage("INFO", "This is an info message.");
echo $log->logMessage("ERROR", "This is an info message.");


echo $log->logInfo('This is some important info');
echo $log->logError('This did not work');
 ?>