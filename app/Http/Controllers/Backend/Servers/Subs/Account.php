<?php


namespace App\Http\Controllers\Backend\Servers\Subs;


interface Account
{
    /**
     * @return mixed
     */
    public function accountAdd();

    /**
     * @return mixed
     */
    public function accountUpdate();

    /**
     * @return mixed
     */

    public function accountDelete();

    /**
     * @return mixed
     */

    public function accountList();

    /**
     * @return mixed
     */

    public function accountSuspend();

    /**
     * @return mixed
     */

    public function accountUnSuspend();

    /**
     * @return mixed
     */
    public function accountDetail();

    /**
     * @return mixed
     */
    public function accountChangePassword();

    /**
     * @return mixed
     */
    public function accountQuota();

    /**
     * @return mixed
     */
    public function accountAutoLogin();




}
