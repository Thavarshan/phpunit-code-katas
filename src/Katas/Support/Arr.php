<?php

namespace Katas\Support;

class Arr
{
    /**
     * Pluck an array of values from an array. (Only for PHP 5.3+).
     *
     * @param $array - data
     * @param $key   - value you want to pluck from array
     *
     * @return array - plucked array only with key data
     */
    public static function pluck($array, $key)
    {
        return array_map(function ($v) use ($key) {
            return is_object($v) ? $v->$key : $v[$key];
        }, $array);
    }
}
