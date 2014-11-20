<?php namespace Nontakorn\Auth;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('authbackend', function()
        {
            return new AuthBackend;
        });
    }

}