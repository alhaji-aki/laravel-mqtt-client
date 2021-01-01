<?php

namespace AlhajiAki\MqttClient\Console;

use AlhajiAki\MqttClient\Facades\MqttClient;
use Illuminate\Console\Command;
use Morbo\React\Mqtt\Packets;

class ListenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:listen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listen for mqtt subscription';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // TODO: get topics from a source
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
    }
}
