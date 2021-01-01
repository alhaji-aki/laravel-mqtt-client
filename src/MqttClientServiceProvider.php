<?php

namespace AlhajiAki\MqttClient;

use AlhajiAki\MqttClient\MqttClient;
use Illuminate\Support\ServiceProvider;

class MqttClientServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/laravel-mqtt-client.php' => config_path('laravel-mqtt-client.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-mqtt-client.php', 'laravel-mqtt-client');

        $this->commands([
            Console\ListenCommand::class,
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('mqtt_client', function ($app) {
            return new MqttClient($app['config']['laravel-mqtt-client']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['mqtt_client'];
    }
}
