<?php

use AlhajiAki\MqttClient\Facades\MqttClient;

require_once __DIR__ . '/setup.php';

MqttClient::connect()->subscribe('foo/bar', function ($message) {
    printf(
        'Received payload "%s" for topic "%s"%s',
        $message->getPayload(),
        $message->getTopic(),
        PHP_EOL
    );
}, 0);
