<?php


namespace App\Http\Controllers\Backend\Servers\Subs;


interface Database
{
    /**
     * @return mixed
     */
    public function databaseAdd();

    /**
     * @return mixed
     */
    public function databaseDelete();

    /**
     * @return mixed
     */
    public function databaseList();

    /**
     * Database User
     */

    /**
     * @return mixed
     */
    public function databaseUserAdd();

    /**
     * @return mixed
     */
    public function databaseUserDelete();

    /**
     * @return mixed
     */
    public function databaseUserList();


}
