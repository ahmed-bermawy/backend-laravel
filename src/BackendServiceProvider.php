<?php

namespace Ollakalla\Backend;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        copy(__DIR__.'/web.php', base_path('routes').'/web.php');
        // publish views to main app
        $this->publishes([
            __DIR__.'/views' => resource_path('views'),
            __DIR__.'/migrations' => database_path('migrations'),
            __DIR__.'/Http' => app_path('Http'),
            __DIR__.'/Models' => app_path('Models'),
            __DIR__.'/Commands' => app_path('Console/Commands'),
        ]);
        
        \SSH::run(array(
            'cd '. public_path(),
            'bower install admin-lte#2.4.0 fontawesome fancybox ionicons eonasdan-bootstrap-datetimepicker jquery-migrate selectize',
        ));
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
//        $this->app->make('Ollakalla\Backend\BackendHomeController');
//        $this->app->make('Ollakalla\Backend\TestController');
    }
}
