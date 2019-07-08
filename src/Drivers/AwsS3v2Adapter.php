<?php
/**
 * @link https://github.com/phpviet/laravel-flysystem
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Flysystem\Drivers;

use DateTimeInterface;
use League\Flysystem\AwsS3v2\AwsS3Adapter;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class AwsS3v2Adapter extends AwsS3Adapter
{
    /**
     * Trả về AWS S3v2 Temporary URL theo đường dẫn chỉ định.
     *
     * @param  string  $path
     * @param  DateTimeInterface  $expiration
     * @param  array  $options
     * @return string
     */
    public function getTemporaryUrl(string $path, DateTimeInterface $expiration, array $options = [])
    {
        return (string) $this->getClient()->getObjectUrl(
            $this->getBucket(),
            $this->getPathPrefix().$path,
            $expiration,
            $options
        );
    }
}
