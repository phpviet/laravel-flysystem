<?php
/**
 * @link https://github.com/phpviet/laravel-flysystem
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Flysystem\Drivers;

use League\Flysystem\FilesystemInterface;
use Illuminate\Contracts\Foundation\Application;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
abstract class BaseDriver
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var array
     */
    protected $config;

    /**
     * Khởi tạo đối tượng Filesystem thông qua callable.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  array  $config
     * @return \League\Flysystem\FilesystemInterface
     */
    public function __invoke(Application $app, array $config): FilesystemInterface
    {
        $this->app = $app;
        $this->config = $config;

        return $this->createFilesystem();
    }

    /**
     * Phương thức trừu tượng tạo Filesystem theo config chỉ định.
     *
     * @return \League\Flysystem\FilesystemInterface
     */
    abstract protected function createFilesystem(): FilesystemInterface;
}
