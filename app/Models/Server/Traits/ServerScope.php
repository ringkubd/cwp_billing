<?php


namespace App\Models\Server\Traits;


trait ServerScope
{
    /**
     * @param $query
     * @param bool $status
     * @return mixed
     */
    public function scopeEnable($query, $status = true){
        return $query->where('enable',$status);
    }

    /**
     * @param $query
     * @param bool $status
     * @return mixed
     */

    public function scopeSecure($query, $status = true){
        return $query->where('secureConnection',$status);
    }
}
