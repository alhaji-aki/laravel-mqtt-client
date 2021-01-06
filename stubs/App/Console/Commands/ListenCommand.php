<?php

namespace App\Console\Commands;

use AlhajiAki\MqttClient\Facades\MqttClient;
use Illuminate\Console\Command;

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
        MqttClient::connect()->subscribe('foo/bar', function ($message) {
            // TODO: replace this block below with your own logic
            printf(
                'Received payload "%s" for topic "%s"%s',
                $message->getPayload(),
                $message->getTopic(),
                PHP_EOL
            );
        }, 0);
    }
}
