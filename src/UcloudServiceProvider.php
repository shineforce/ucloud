<?php
namespace Shineforce\Ucloud;

use Illuminate\Support\ServiceProvider;

class UcloudServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
        $config_file = __DIR__ . '/../config/config.php';

        $this->mergeConfigFrom($config_file, 'ucloud');

        $this->publishes([
            $config_file => config_path('ucloud.php')
        ], 'ucloud');
    }

    public function register()
    {
        $this->app->bind('ucloud', function () {
            return new ucloud();
        });

        $this->app->alias('ucloud', Ucloud::class);
    }

    public function provides()
    {
        return ['ucloud', Ucloud::class];
    }
}