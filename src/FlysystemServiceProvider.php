<?php
/**
 * @link https://github.com/phpviet/laravel-flysystem
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Flysystem;

use Closure;
use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\FilesystemManager;
use PHPViet\Laravel\Flysystem\Drivers\Viettel\Driver as ViettelDriver;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class FlysystemServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $driversMap = [
        'viettel' => ViettelDriver::class,
    ];

    public function register(): void
    {
        $this->registerDrivers();
    }

    protected function registerDrivers(): void
    {
        $this->app->extend('filesystem', function (FilesystemManager $manager) {
            foreach ($this->driversMap as $driver => $class) {
                $manager->extend($driver, Closure::fromCallable(new $class()));
            }

            return $manager;
        });
    }
}
