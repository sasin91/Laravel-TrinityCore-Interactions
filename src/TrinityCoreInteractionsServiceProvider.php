<?php

namespace Sasin91\LaravelTrinityCoreInteractions;

use Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;
use Illuminate\Support\ServiceProvider;

class TrinityCoreInteractionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../stubs/config.php' => config_path('TrinityCore.php'),
        ], 'tc-config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSoapInteractions();
    }

    protected function registerSoapInteractions()
    {
        $this->registerSoapAccountInteractions();
        $this->registerSoapCommunicationInteractions();
        $this->registerSoapListingInteractions();
    }

    protected function registerSoapAccountInteractions()
    {
        $this->app->singleton(Soap\CreateAccountContract::class, Soap\CreateAccount::class);
        $this->app->singleton(Soap\Account\DeleteAccountContract::class, Soap\Account\DeleteAccount::class);

        $this->app->singleton(Soap\Account\SetAccountPasswordContract::class, Soap\Account\SetAccountPassword::class);

        $this->app->singleton(Soap\Account\SetAccountExpansionContract::class, Soap\Account\SetAccountExpansion::class);
        $this->app->singleton(Soap\Account\SetGMLevelContract::class, Soap\Account\SetGMLevel::class);
    }

    protected function registerSoapCommunicationInteractions()
    {
        $this->app->singleton(Soap\AnnounceContract::class, Soap\Announce::class);
    }

    protected function registerSoapListingInteractions()
    {
        $this->app->singleton(Soap\Account\OnlineListContract::class, Soap\Account\OnlineList::class);
    }
}
