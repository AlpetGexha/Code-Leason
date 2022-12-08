<?php
// namespace App\Helper;

use Illuminate\Support\Facades\Redis;

function rememberForever($key, Closure $callback)
{
    if (Redis::exists($key)) {
        return json_decode(Redis::get($key));
    }

    $value = $callback();

    Redis::set($key, $value);

    return $value;
}


function remember($key, $callback, $ttl)
{
    if (Redis::exists($key)) {
        return json_decode(Redis::get($key));
    }

    $value = $callback();

    Redis::setex($key, $ttl, $value);

    return $value;
}
