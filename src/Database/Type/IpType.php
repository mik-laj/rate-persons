<?php
namespace App\Database\Type;

use Cake\Database\Driver;
use Cake\Database\Type;
use PDO;
use Cake\Log\Log;

class IpType extends Type
{

    public function toPHP($value, Driver $driver)
    {
        if ($value === null|| $value=== '' || $value === 0) {
            return null;
        }
        // return $value;
        return inet_ntop($value);
    }

    public function marshal($value)
    {
        if (is_array($value) || $value === null) {
            return $value;
        }
        return $value;
    }

    public function toDatabase($value, Driver $driver)
    {
        return inet_pton($value);
    }

    public function toStatement($value, Driver $driver)
    {
        if ($value === null || $value==='') {
            return PDO::PARAM_NULL;
        }
        return PDO::PARAM_LOB;
    }

}
