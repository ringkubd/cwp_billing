<?php


namespace App\Http\Controllers\Backend\Servers\Subs;


interface Ftp
{
    /**
     * @return mixed
     */
    public function ftpAdd();

    /**
     * @return mixed
     */
    public function ftpUpdate();

    /**
     * @return mixed
     */
    public function ftpDelete();

    /**
     * @return mixed
     */
    public function ftpList();

}
