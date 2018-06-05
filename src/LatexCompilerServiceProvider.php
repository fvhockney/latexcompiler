<?php
/**
* Service Provider for fvhockney/latexcompiler
* @package fvhockney/latexcompiler
*/

namespace Fvhockney\LatexCompiler;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Arr;

class LatexCompilerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
          __DIR__.'/config/fvlatex.php' => config_path('fvlatex.php'),
        ], 'fvlatex-config');
        $this->loadViewsFrom(__DIR__.'/views', 'fvlatexcompiler');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
          __DIR__.'/config/fvlatex.php', 'fvlatexcompiler'
        );
        $this->mergeConfigFrom(
          __DIR__.'/config/fvlatexlogchannel.php', 'logging'
        );
    }

    /**
     * Merge the given configuration with the existing configuration.
     *
     * @see https://medium.com/@koenhoeijmakers/properly-merging-configs-in-laravel-packages-a4209701746d
     * @param  string  $path
     * @param  string  $key
     * @return void
     */
    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);
        $this->app['config']->set($key, $this->mergeConfigs(require $path, $config));
    }

    /**
     * Merges the configs together and takes multi-dimensional arrays into account.
     *
     * @see https://medium.com/@koenhoeijmakers/properly-merging-configs-in-laravel-packages-a4209701746d
     * @param  array  $original
     * @param  array  $merging
     * @return array
     */
    protected function mergeConfigs(array $original, array $merging)
    {
        $array = array_merge($original, $merging);
        foreach ($original as $key => $value) {
            if (! is_array($value)) {
                continue;
            }
            if (! Arr::exists($merging, $key)) {
                continue;
            }
            if (is_numeric($key)) {
                continue;
            }
            $array[$key] = $this->mergeConfigs($value, $merging[$key]);
        }
        return $array;
    }
}
