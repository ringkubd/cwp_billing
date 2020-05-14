<?php


namespace App\Http\Controllers\Backend\Servers\Subs;


interface Package
{
    public function packageAdd();

    public function packageUpdate();

    public function packageDelete();

    public function packageList();

    /** User Action */

    public function userChangePackage();
}
