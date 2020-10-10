<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class UserLevel implements CastsAttributes
{
    const ADMIN = 1;
    const AUTHOR = 2;
    const NORMAL = 3;
    const KEUANGAN = 4;
    const list = [
        "ADMIN" => UserLevel::ADMIN,
        "AUTHOR" => UserLevel::AUTHOR,
        "NORMAL" => UserLevel::NORMAL,
        "KEUANGAN" => UserLevel::KEUANGAN,
    ];
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        return $value;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        return $value;
    }

    public static function lang($value)
    {
        switch ($value) {
            case UserLevel::ADMIN:
                return "Administrator";
                break;
            case UserLevel::AUTHOR:
                return "Author";
                break;
            case UserLevel::NORMAL:
                return "Normal";
                break;
            case UserLevel::KEUANGAN:
                return "Keuangan";
                break;
            default:
                return  "Tidak Terdefinisi";
                break;
        }
    }
}
