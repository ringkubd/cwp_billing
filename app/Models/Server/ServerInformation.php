<?php

namespace App\Models\Server;

use Altek\Accountant\Contracts\Recordable;
use Altek\Accountant\Recordable as RecordableTrait;
use App\Models\Server\Traits\ServerScope;
use Illuminate\Database\Eloquent\Model;

class ServerInformation extends Model implements Recordable
{
    use  RecordableTrait, ServerScope;
    //
    protected $fillable = [
        'name',
        'host_name',
        'server_ip',
        'enable',
        'ns1',
        'ns2',
        'ns3',
        'ns4',
        'username',
        'api_key',
        'password',
        'secureConnection'
    ];

    public function isEnable(){
        return $this->enable;
    }

    public function isSecure(){
        return $this->secureConnection;
    }
}
