<?php

namespace AlhajiAki\MqttClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \AlhajiAki\Mqtt\MqttClient connect()
 * @method static \AlhajiAki\Mqtt\MqttClient publish(string $topic, string $data, int $qos = 0, bool $dup = false, bool $retain = false)
 * @method static \AlhajiAki\Mqtt\MqttClient subscribe(string $topic, Closure $successListener, int $qos = 0, Closure $errorListener = null)
 * @method static \AlhajiAki\Mqtt\MqttClient unsubscribe(string $topic, Closure $successListener = null, Closure $errorListener = null)
 * @method static void disconnect(\React\Socket\ConnectionInterface $stream)
 * @method static void run()
 *
 * @see \AlhajiAki\Mqtt\MqttClient
 */
class MqttClient extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mqtt_client';
    }
}
