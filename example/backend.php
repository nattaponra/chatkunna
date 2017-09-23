<?php

use chatkun\Chatkun;


require_once __DIR__ . '/../app/autoload.php';


$auth_key = '58ebcb1a726b48445a3a';
$secret = '8eeefa7663bd337d7d61';
$app_id = '404407';

$chatkun = new Chatkun($auth_key, $secret, $app_id);
$chatkun->sendMessage("Hello");