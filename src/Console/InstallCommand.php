<?php

namespace AlhajiAki\MqttClient\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publishes mqtt config file and add console command to your application';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // config file
        $this->call('vendor:publish', ['--provider' => 'AlhajiAki\MqttClient\MqttClientServiceProvider']);

        // Commands...
        (new Filesystem)->ensureDirectoryExists(app_path('Console/Commands'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/App/Console/Commands', app_path('Console/Commands'));

        Artisan::starting(function ($artisan) {
            $artisan->resolveCommands([
                \App\Console\Commands\ListenCommand::class,
            ]);
        });

        $this->info('Mqtt Client scaffolding completed successfully.');
    }
}
