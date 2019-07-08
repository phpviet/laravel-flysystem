Viettel Cloud Storage
===============================

### Cài đặt 

Để sử dụng được dịch vụ Viettel cloud storage đầu tiên bạn cần cài đặt **Flysystem** adapter thông qua [Composer](https://getcomposer.org):

```php
composer require league/flysystem-aws-s3-v2
```

### Cấu hình

Sau khi cài đặt xong bạn hãy mở file `config/filesystems.php` để cấu hình Viettel trong mục `disks`:

```php
....
'disks' => [
    ....
    'viettel' => [
        'driver' => 'viettel',
        'key' => 'Do Viettel IDC cấp',
        'secret' => 'Do Viettel IDC cấp',
        'bucket' => 'bucket của bạn'
    ],
]
```

### Sử dụng

Sau khi đã cài đặt và cấu hình, ngay bây giờ bạn đã có thể truy cập đến Viettel cloud storage thông qua `Storage` facade:

```php
use Storage;

Storage::disk('viettel')->put('file.txt', 'Contents');
```

Cách sử dụng các phương thức giống với storage của Laravel bạn có thể kham khảo thêm các phương thức tại 
[đây](https://laravel.com/docs/master/filesystem).

Để tăng performance bạn có thể thiết lập cache cho Viettel disk như `S3 Storage` kham khảo cách thiết lập tại 
[đây](https://laravel.com/docs/master/filesystem#configuration).
