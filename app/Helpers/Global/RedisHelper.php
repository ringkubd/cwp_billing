<?php
if (!function_exists('redisGetCollection')){
    /**
     * @inheritDoc get data
     */
    function redisGetCollection($key){
        try {
            if (!\Illuminate\Support\Facades\Redis::exists($key)){
                $message = trans('redis.exception.not found');
                throw new Exception($message, 404);
            }
            return collect(json_decode(\Illuminate\Support\Facades\Redis::get($key)));
        }catch (Exception $exception){
            session()->flash("errors", $exception->getMessage());
            return $exception->getMessage();
        }
    }
}

if (!function_exists('redisSet')){
    /**
     * @inheritDoc get data if set or set and return data
     */
    function redisSet($key, $data): bool {
        try {
            \Illuminate\Support\Facades\Redis::set($key, $data);
        }catch (Exception $exception){
            session()->flash("errors", $exception->getMessage());
            return  false;
        }

        return true;
    }
}

if (!function_exists('redisSetGet')){
    /**
     * @inheritDoc get data if set or set and return data
     */
    function redisSetGet($key, $data) {
        try {
            \Illuminate\Support\Facades\Redis::set($key, $data);
            return  $data;
        }catch (RedisException $exception){
            session()->flash("errors", $exception->getMessage());
            return  false;
        }

        return true;
    }
}

if (!function_exists('redisSetGetCollection')){
    /**
     * @inheritDoc get data
     */
    function redisSetGetCollection($key, $data){
        try {
            if (!\Illuminate\Support\Facades\Redis::exists($key)){
                \Illuminate\Support\Facades\Redis::set($key, $data);
            }
            return collect(json_decode(\Illuminate\Support\Facades\Redis::get($key)));
        }catch (Exception $exception){
            session()->flash("errors", $exception->getMessage());
            return $exception->getMessage();
        }
    }
}
