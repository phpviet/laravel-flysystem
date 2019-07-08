<?php
/**
 * @link https://github.com/phpviet/laravel-flysystem
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Flysystem\Drivers\Viettel;

use League\Flysystem\Filesystem as BaseFilesystem;
use PHPViet\Laravel\Flysystem\Drivers\AwsS3v2FilesystemCompatible;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class Filesystem extends BaseFilesystem
{
    use AwsS3v2FilesystemCompatible;
}
