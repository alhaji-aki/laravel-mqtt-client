# installation

```bash
composer require alhaji-aki/laravel-mqtt-client
```

publish config and adds listen command to app

```bash
php artisan mqtt:install
```

change the logic in the listen command and register it in the Command Kernel

# available methods:

### connect to a broker

```php
MqttClient::connect();
```

### get connection

```php
MqttClient::connect()->connection();
```

### disconnect

```php
use AlhajiAki\MqttClient\Facades\MqttClient;

$connection = MqttClient::connect()->connection();
$connection->disconnect();
```

### publish

```php
use AlhajiAki\MqttClient\Facades\MqttClient;

$data = [
    'foo' => 'bar',
    'bar' => 'baz',
    'time' => time(),
]

MqttClient::connect()->publish('foo/bar', json_encode($data), 0);
```

### subscribe

```php
use AlhajiAki\MqttClient\Facades\MqttClient;
use Morbo\React\Mqtt\Packets\Publish;

MqttClient::connect()->subscribe('foo/bar', function ($stream) {
    $stream->on(Publish::EVENT, function (Publish $message) {
        printf(
            'Received payload "%s" for topic "%s"%s',
            $message->getPayload(),
            $message->getTopic(),
            PHP_EOL
        );
    });
}, 0);
```

unsubscribe

```php
use AlhajiAki\MqttClient\Facades\MqttClient;

MqttClient::connect()->unsubscribe('foo/bar', function ($message) {
    printf(
        'Received payload "%s" for topic "%s"%s',
        $message->getPayload(),
        PHP_EOL
    );
}, function ($ex) {
    printf('Error occured: %s', $ex->getMessage());
});
```
