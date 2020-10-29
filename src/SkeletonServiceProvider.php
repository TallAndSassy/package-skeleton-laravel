<?php

namespace Spatie\Skeleton;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Spatie\Skeleton\Commands\SkeletonCommand;
use Spatie\Skeleton\Http\Controllers\SkeletonController;

class SkeletonServiceProvider extends ServiceProvider
{
    public static string $blade_prefix = "bladeprefix"; #bladeprefix is a template term
    public static string $language_prefix = "languageprefix"; #languageprefix is a template term

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__ . '/../config/skeleton.php' => config_path('skeleton.php'),
                ],
                'config'
            );

            $this->publishes(
                [
                    __DIR__ . '/../resources/views' => base_path('resources/views/vendor/skeleton'),
                ],
                'views'
            );

            $migrationFileName = 'create_skeleton_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes(
                    [
                        __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path(
                            'migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName
                        ),
                    ],
                    'migrations'
                );
            }

            $this->publishes([
                 __DIR__.'/../resources/public' => public_path('spatie/skeleton'),
                ], ['public']);

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('spatie/skeleton'),
            ], 'grok.views');*/

            // Publishing the translation files.
            $this->loadTranslationsFrom(__DIR__ . '/../resources/lang/', static::$language_prefix);
            if ($this->app->runningInConsole()) {
                $this->publishes([
                    __DIR__.'/../resources/lang' => "{$this->app['path.lang']}/vendor/".static::$language_prefix,
                    ], 'spatie.skeleton');
            }



            // Registering package commands.
            $this->commands(
                [
                    SkeletonCommand::class,
                ]
            );
        }

        // Translation
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'bladeprefix'); // You could, for example, choose something else like Spaitie or 'Stuff'
        if ($this->app->runningInConsole()) {
            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/spatie/skeleton'),
                # MaybeToDo __DIR__.'/../resources/lang' => "{$this->app['path.lang']}/spatie/skeleton", see https://github.com/spatie/laravel-backup/blob/master/src/BackupServiceProvider.php
            ], 'spatie.skeleton');*/
        }



        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bladeprefix');


        Route::macro(
            'bladeprefix',
            function (string $prefix) {
                Route::prefix($prefix)->group(
                    function () {
                        // Prefix Route Samples -BEGIN-
                        // Sample routes that only show while developing...
                        if (App::environment(['local', 'testing'])) {
                            // prefixed url to string
                            Route::get(
                                '/Spatie/Skeleton/sample_string', // you will absolutely need a prefix in your url
                                // like: 'https://localhost/bladeprefix/Spatie/Skeleton/sample_string'
                                function () {
                                    return "Hello Skeleton string via blade prefix";
                                }
                            );

                            // prefixed url to blade view
                            Route::get(
                                '/Spatie/Skeleton/sample_blade',
                                function () {
                                    return view('bladeprefix::sample_blade');
                                }
                            );

                            // prefixed url to controller
                            Route::get(
                                '/Spatie/Skeleton/controller',
                                [SkeletonController::class, 'sample']
                            );
                        }
                        // Prefix Route Samples -END-

                        // TODO: Add your own prefixed routes here...
                    }
                );
            }
        );
        Route::bladeprefix('bladeprefix'); // This works. http://test-jet.test/bladeprefix/Spatie/Skeleton/string
        // They are addatiive, so in your own routes/web.php file, do Route::bladeprefix('staff'); to
        // make http://test-jet.test/staff/Spatie/Skeleton/string work


        // global url samples -BEGIN-
        if (App::environment(['local', 'testing'])) {
            // global url to string
            Route::get(
                '/grok/Spatie/Skeleton/sample_string',
                function () {
                    return "Hello Skeleton string via global url.";
                }
            );

            // global url to blade view
            Route::get(
                '/grok/Spatie/Skeleton/sample_blade',
                function () {
                    return view('bladeprefix::sample_blade');
                }
            );

            // global url to controller
            Route::get('/grok/Spatie/Skeleton/controller', [SkeletonController::class, 'sample']);
        }
        // global url samples -END-

        // TODO: Add your own global routes here...

        // GROK
        if (App::environment(['local', 'testing'])) {
            \ElegantTechnologies\Grok\GrokWrangler::grokMe(static::class, 'Spatie', 'skeleton', 'resources/views/grok', 'bladeprefix');//bladeprefix gets macro'd out
            Route::get('/grok/Spatie/Skeleton', fn () => view('bladeprefix::grok/index'));
        }

        // TODO: Register your livewire components that live in this package here:
        # \Livewire\Livewire::component('tassygroklivewirejet::a-a-nothing',  \TallAndSassy\GrokLivewireJet\Components\DemoUiChunks\AANothing::class);
        // TODO: Add your own other boot related stuff here...

        // TODO: Add your own admin menu items here
        /*
         * ring $handle, string $Label, ?string $SvgHtml, ?string $IconName, ?string $urlIfNoFurtherChildren_nullIfGroup, ?string $IconSizingClasses = null
         * \TallAndSassy\PageGuide\MenuTree::singleton('upper')->pushTop( // 'lower' puts items down low.
                'admin.Cafe', // Key
                'Cafe',         // $Label
                null,//$SvgHtml
                'heroicon-o-question-mark-circle', // $IconNameVisit: https://blade-ui-kit.com/blade-icons/heroicon-o-home
                null, //$urlIfNoFurtherChildren_nullIfGroup
                null //$IconSizingClasses
            )
                ->pushLink('admin.salad.fruit' . uniqid(), 'Fruit Salad', '/admin/fruit')
                ->pushLink('admin.salad.leaf' . uniqid(), 'Lettuce Salad', '/admin/leaf')
                ->pushLink('admin.salad.potato' . uniqid(), 'Yucky Salad', '/admin/potato')
                ->pushGroup('condiments' . uniqid(), 'Condiments')
                ->pushLink(
                    'admin.condiments.mustard' . uniqid(),
                    'Hymans Brand Mustard',
                    '/admin/condiment/mustard'
                );
         */
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/skeleton.php', 'skeleton');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
