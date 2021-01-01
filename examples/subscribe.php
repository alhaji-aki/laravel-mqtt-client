<?php

use AlhajiAki\MqttClient\Facades\MqttClient;
use Morbo\React\Mqtt\Packets;

require_once __DIR__ . '/setup.php';

MqttClient::connect()->subscribe('foo/bar', function ($stream) {
    $stream->on(Packets\Publish::EVENT, function (Packets\Publish $message) {
        printf(
            'Received payload "%s" for topic "%s"%s',
            $message->getPayload(),
            $message->getTopic(),
            PHP_EOL
        );
    });
}, 0)->run();
