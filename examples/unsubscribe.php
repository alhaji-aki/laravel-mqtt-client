<?php

use AlhajiAki\MqttClient\Facades\MqttClient;

require_once __DIR__ . '/setup.php';

MqttClient::connect()->unsubscribe('foo/bar', function ($message) {
    printf(
        'Received payload "%s" for topic "%s"%s',
        $message->getPayload(),
        PHP_EOL
    );
}, function ($ex) {
    printf('Error occured: %s', $ex->getMessage());
});
