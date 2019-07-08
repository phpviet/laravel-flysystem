<?php
/**
 * @link https://github.com/phpviet/laravel-flysystem
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Flysystem\Drivers;

use Aws\S3\S3Client;
use Illuminate\Filesystem\Cache;
use League\Flysystem\AdapterInterface;
use League\Flysystem\Cached\CachedAdapter;
use League\Flysystem\Cached\CacheInterface;
use League\Flysystem\Cached\Storage\Memory as MemoryStore;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
trait AwsS3v2DriverCompatible
{
    /**
     * Khởi tạo AwsS3v2 adapter.
     *
     * @return \League\Flysystem\AdapterInterface
     */
    protected function createFilesystemAdapter(): AdapterInterface
    {
        $adapter = new AwsS3v2Adapter(
            $this->createS3Client(),
            $this->config['bucket'],
            $this->config['root'] ?? null,
            $this->config['options'] ?? []
        );

        if (isset($this->config['cache'])) {
            $adapter = new CachedAdapter(
                $adapter,
                $this->createCacheStore()
            );
        }

        return $adapter;
    }

    /**
     * Khởi tạo Aws S3 client.
     *
     * @return \Aws\S3\S3Client
     */
    protected function createS3Client(): S3Client
    {
        $config = array_merge([
            'endpoint' => $this->getEndPoint(),
            'version' => 'latest',
            'signature_version' => 's3',
        ], $this->config);

        return S3Client::factory($config);
    }

    /**
     * Khởi tạo cache.
     *
     * @return \League\Flysystem\Cached\CacheInterface
     */
    protected function createCacheStore(): CacheInterface
    {
        $config = $this->config['cache'];

        if (true === $config) {
            return new MemoryStore();
        }

        return new Cache(
            $this->app['cache']->store($config['store']),
            $config['prefix'] ?? 'flysystem',
            $config['expire'] ?? null
        );
    }

    /**
     * Phương thức trừu tượng trả về đường dẫn endpoint.
     *
     * @return string
     */
    abstract protected function getEndPoint(): string;
}
