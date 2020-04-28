<?php

namespace App\Providers;

use App\Helper\Uploader\FileUploader;
use Faker\Factory;
use Faker\Generator;
use Faker\Provider\ru_RU\Text;
use function foo\func;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            return Factory::create('uk_UA');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
