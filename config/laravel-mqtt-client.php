<?php

use Illuminate\Support\Str;
use Morbo\React\Mqtt\Packets\QoS\Levels;

return [
    'host' => env('MQTT_HOST', '127.0.0.1:1883'),
    'username' => env('MQTT_USERNAME', null),
    'password' => env('MQTT_PASSWORD', null),
    'client_id' => env('MQTT_CLIENT_ID', Str::slug(env('APP_NAME', 'laravel'), '-') . '-app'),
    'certfile' => env('MQTT_CERT_FILE', null),
    'protocol' => env('MQTT_PROTOCOL', 'tcp'),
    'debug' => (bool) env('APP_DEBUG', true),
    'version' => \Morbo\React\Mqtt\Protocols\Version4::class,
    'keep_alive' => 0,
    'clean_session' => (bool) env('MQTT_CLEAN_SESSION', true),
    'will_topic' => env('MQTT_WILL_TOPIC', null),
    'will_message' => env('MQTT_WILL_MESSAGE', null),
    'will_qos' => env('MQTT_WILL_QOS', Levels::AT_MOST_ONCE_DELIVERY),
    'will_retain' => (bool) env('MQTT_WILL_RETAIN', false),
];
