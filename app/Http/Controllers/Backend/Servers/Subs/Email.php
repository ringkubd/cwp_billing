<?php


namespace App\Http\Controllers\Backend\Servers\Subs;


interface Email
{
    public function emailAdd();

    /**
     * @return mixed
     */
    public function emailUpdate();

    /**
     * @return mixed
     */
    public function emailDelete();

    /**
     * @return mixed
     */
    public function emailList();

    /**
     * @return mixed
     */
    public function emailSuspend();

    /**
     * @return mixed
     *
     */
    public function emailUnSuspend();
}
