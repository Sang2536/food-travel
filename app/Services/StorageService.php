<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class UserService {
    public function saveCache($key, $data, $setTime = null) {
        if (! isset($setTime))
            Cache::get($key, $data);
        else
            Cache::get($key, $data, $setTime);

        return 1;
    }

    public function getCache($key) {
        $res = Cache::get($key);
        if ($res)
            return $res;
        else
            return 0;
    }

}
