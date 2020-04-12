<?php


namespace App\Http\Controllers\Backend\Servers;


use App\Http\Controllers\Backend\Servers\Subs\Account;
use App\Http\Controllers\Backend\Servers\Subs\Database;
use App\Http\Controllers\Backend\Servers\Subs\Domain;
use App\Http\Controllers\Backend\Servers\Subs\Email;
use App\Http\Controllers\Backend\Servers\Subs\Ftp;
use App\Http\Controllers\Backend\Servers\Subs\Package;

interface ApiInterface extends Account, Database, Email, Ftp, Package, Domain
{

}
