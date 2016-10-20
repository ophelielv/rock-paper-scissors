<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../classes/Multiplayers.class.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use RockPaperScissors\Multiplayers;

$server = IoServer::factory(
  new HttpServer(
    new WsServer(
      new Multiplayers()
    )
  ),
  8181
);
echo "Websocket server is running. Press ctrl-c to exit...\r\n";
$server->run();

/*
console:
 netstat -tulpn
 kill PID*/