<?php namespace Nowpics\Superpay;

use Illuminate\Support\ServiceProvider;

class SuperpayServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('superpay.php'),
        ]);

        $this->app->bind('superpay', function() {
            return new Superpay(
                config('superpay.url'),
                config('superpay.codigo'),
                config('superpay.login'),
                config('superpay.senha')
            );
        });
    }
}