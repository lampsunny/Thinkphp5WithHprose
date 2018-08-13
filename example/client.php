<?php

require "vendor/autoload.php";

$client = new \Hprose\Http\Client('http://hprosetest.me/example/server.php', false);
$result = $client->hello("world");
echo $result; 