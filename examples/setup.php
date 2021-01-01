<?php

require 'vendor/autoload.php';

use AlhajiAki\MqttClient\MqttClientServiceProvider;
use Orchestra\Testbench\TestCase as Base;

class TestCase extends Base
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            MqttClientServiceProvider::class,
        ];
    }
}

$app = (new TestCase())->createApplication();
