<?php
/**
 * @link https://github.com/phpviet/laravel-flysystem
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Flysystem\Drivers\Viettel;

use Illuminate\Support\Arr;
use League\Flysystem\FilesystemInterface;
use PHPViet\Laravel\Flysystem\Drivers\BaseDriver;
use PHPViet\Laravel\Flysystem\Drivers\AwsS3v2DriverCompatible;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class Driver extends BaseDriver
{
    use AwsS3v2DriverCompatible;

    /**
     * {@inheritdoc}
     */
    protected function createFilesystem(): FilesystemInterface
    {
        $config = Arr::only($this->config, ['visibility', 'disable_asserts', 'url']);

        return new Filesystem(
            $this->createFilesystemAdapter(),
            count($config) > 0 ? $config : null
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getEndPoint(): string
    {
        return 'http://'.$this->config['key'].'.cloudstorage.com.vn';
    }
}
