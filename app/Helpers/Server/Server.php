<?php


namespace App\Helpers\Server;


use App\Models\Server\ServerInformation;

class Server
{
    public function activeServer($enable = true)
    {
        return ServerInformation::enable($enable)->get();
    }
}
