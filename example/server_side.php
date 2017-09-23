<?php

use chatkun\Chatkun;

require_once 'config.php';
require_once __DIR__ . '/../app/autoload.php';


$chatkun = new Chatkun($config['auth_key'], $config['secret'], $config['app_id']);

$chatkun->sendMessage("Hello");