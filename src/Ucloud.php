<?php
namespace Shineforce\Ucloud;

require_once __DIR__ . "/v1/proxy.php";

class Ucloud
{
    public static function bucket()
    {
        return config('ucloud.bucket');
    }

    public static function upload($key, $file)
    {
        list($data, $err) = UCloud_PutFile(self::bucket(), $key, $file);
        if ($err->Code == '-1') {
            return $err;
        }else{
            return $data['ETag'];
        }
    }
}