<?php

use Bootstrap\WebSocketApplication;

require_once __DIR__.'/../vendor/autoload.php';

// Создание экземпляра приложения.
$webSocketApplication = new WebSocketApplication();

// Запуск приложения.
$webSocketApplication->run();