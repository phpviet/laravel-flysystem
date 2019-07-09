<?php
/**
 * @link https://github.com/phpviet/laravel-flysystem
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Flysystem\Drivers;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
trait AwsS3v2FilesystemCompatible
{
    /**
     * Trả về AWS S3v2 URL theo đường dẫn chỉ định.
     *
     * @param  string  $path
     * @return string
     */
    public function getUrl(string $path): string
    {
        $adapter = $this->getAdapter();
        $path = $adapter->getPathPrefix().$path;

        if (! is_null($url = $this->getConfig()->get('url'))) {
            return rtrim($url, '/').'/'.ltrim($path, '/');
        }

        return $adapter->getClient()->getObjectUrl(
            $adapter->getBucket(),
            $path
        );
    }
}
