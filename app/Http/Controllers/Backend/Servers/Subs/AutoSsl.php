<?php


namespace App\Http\Controllers\Backend\Servers\Subs;


interface AutoSsl
{
    /**
     * @return mixed
     */
    public function autoSslAdd();

    /**
     * @return mixed
     */
    public function autoSslDelete();

    /**
     * @return mixed
     */

    public function autoSslList();

    /**
     * @return mixed
     */

    public function autoSslRenew();
}
