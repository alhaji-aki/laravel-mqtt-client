<?php

use AlhajiAki\MqttClient\Facades\MqttClient;

require_once __DIR__ . '/setup.php';

$data = [
    'foo' => 'bar',
    'bar' => 'baz',
    'time' => time(),
];

$qos = Morbo\React\Mqtt\Packets\QoS\Levels::AT_MOST_ONCE_DELIVERY;  // 0

MqttClient::connect()->publish('foo/bar', json_encode($data), $qos)->run();
