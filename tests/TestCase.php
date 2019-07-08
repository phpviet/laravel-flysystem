<?php
/**
 * @link https://github.com/phpviet/laravel-flysystem
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Flysystem\Tests;

use Illuminate\Cache\CacheServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Illuminate\Filesystem\FilesystemServiceProvider;
use PHPViet\Laravel\Flysystem\FlysystemServiceProvider;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class TestCase extends BaseTestCase
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('filesystems', [
            'disks' => [
                'viettel' => [
                    'driver' => 'viettel',
                    'key' => 'test',
                    'secret' => 'test',
                    'bucket' => 'test'
                ],
            ]
        ]);
    }

    protected function getApplicationProviders($app): array
    {
        return [
            CacheServiceProvider::class,
            FilesystemServiceProvider::class,
            FlysystemServiceProvider::class,
        ];
    }
}
