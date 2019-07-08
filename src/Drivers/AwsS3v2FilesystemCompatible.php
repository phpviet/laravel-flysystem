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
     * @param $path
     * @return string
     */
    public function getUrl($path): string
    {
        $adapter = $this->getAdapter();

        if (! is_null($url = $this->getConfig()->get('url'))) {
            $path = $adapter->getPathPrefix().$path;

            return rtrim($url, '/').'/'.ltrim($path, '/');
        }

        return $adapter->getClient()->getObjectUrl(
            $adapter->getBucket(),
            $adapter->getPathPrefix().$path
        );
    }
}
