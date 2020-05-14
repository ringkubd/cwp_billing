<?php


namespace App\Http\Controllers\Backend\Servers\Subs;


interface Domain
{
    public function domainAdd();

    public function domainSubAdd();

    public function domainDkim();
}
