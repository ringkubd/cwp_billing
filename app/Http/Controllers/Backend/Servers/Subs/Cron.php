<?php


namespace App\Http\Controllers\Backend\Servers\Subs;


interface Cron
{
    /**
     * @return mixed
     */
    public function cronAdd();

    /**
     * @return mixed
     */
    public function cronDelete();

    /**
     * @return mixed
     */
    public function cronList();
}
