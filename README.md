composer install
php artisan mqtt:install publish config and adds listen command to app
change the logic in the listen command

available methods
connect to a broker
MqttClient::connect();

get connection
MqttClient::connect()->connection();

disconnect
$connection = MqttClient::connect()->connection();
$connection->disconnect();

publish
MqttClient::connect()->publish('foo/bar', json_encode($data = [
'foo' => 'bar',
'bar' => 'baz',
'time' => time(),
]), 0);

subscribe
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

unsubscribe
MqttClient::connect()->unsubscribe('foo/bar', function ($message) {
    printf(
        'Received payload "%s" for topic "%s"%s',
        $message->getPayload(),
        PHP_EOL
    );
}, function ($ex) {
printf('Error occured: %s', $ex->getMessage());
});
