<?php
/**
 * @link https://github.com/phpviet/laravel-flysystem
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Flysystem\Tests\Drivers;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v2\AwsS3Adapter;
use PHPViet\Laravel\Flysystem\Tests\TestCase;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class ViettelDriverTest extends TestCase
{
    public function testCanGetUrl()
    {
        $adapter = $this->app['filesystem']->disk('viettel');
        $this->assertNotEmpty($adapter->url('aaaaaaaaa', now()));
        $this->assertNotEmpty($adapter->temporaryUrl('aaaaaaaaa', now()));
    }

    public function testCanAccessS3Client()
    {
        $adapter = $this->app['filesystem']->disk('viettel');
        $this->assertInstanceOf(S3Client::class, $adapter->getDriver()->getAdapter()->getClient());
    }

    public function testIsAwsS3v2Adapter()
    {
        $adapter = $this->app['filesystem']->disk('viettel');
        $this->assertInstanceOf(AwsS3Adapter::class, $adapter->getDriver()->getAdapter());
    }
}
