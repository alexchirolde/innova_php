<?php

require_once dirname(__FILE__).'/vendor/autoload.php';
require_once 'config.php';
require_once 'classes/fixtures.php';

$dbObj = new Database();
$u = new DataBaseGenerator($dbObj->connection());

try {
    $u->generateMessages();
    echo "<p>Database fully regenerated!</p>";
    echo "<a href='/'>Click here to go the app</a>";

} catch (Exception $exception){
    echo "<p>$exception</p>";
}

