<?php

namespace Spatie\Skeleton\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\Skeleton\SkeletonServiceProvider;
use Illuminate\Support\Facades\Route;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Spatie\\Skeleton\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );

         // route prefix
        // this must match/sync with what was put in
        // tests/Feature/Http/Controllers/SkeletonControllerTest.php/setup
        $prefix = 'Spatie_Skeleton_Prefix';
        Route::skeleton($prefix); # what is our prefix route (just for testing)?
    }

    protected function getPackageProviders($app)
    {
        return [
            SkeletonServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);


        include_once __DIR__.'/../database/migrations/create_skeleton_table.php';
        (new \CreateSkeletonTable())->up();
    }
}
