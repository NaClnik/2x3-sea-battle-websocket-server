<?php

use Workerman\Worker;

require_once __DIR__.'/../vendor/autoload.php';

// Create a Websocket server
$ws_worker = new Worker('websocket://127.0.0.1:2346');

// 4 processes
$ws_worker->count = 4;

// Emitted when new connection come
$ws_worker->onConnect = function ($connection) {
    echo "New connection\n";

    $connection->send('ok');
};

// Emitted when data received
$ws_worker->onMessage = function ($connection, $data) {
    // Send hello $data
    $connection->send('Hello ' . $data);
};

// Emitted when connection closed
$ws_worker->onClose = function ($connection) {
    echo "Connection closed\n";
};

// Run worker
Worker::runAll();