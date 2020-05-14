<?php


namespace App\Helpers\Server;


use App\Models\Server\ServerInformation;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Redis;
use Psr\Http\Message\ResponseInterface;

class Server
{
    /**
     * @param bool $enable
     * @return mixed
     */
    public function activeServer(bool $enable = true)
    {
        return redisSetGetCollection('active_server', ServerInformation::enable($enable)->get());
    }

    public function postRequest(string $url, array  $formParam = []){
        $activeServer = $this->activeServer(true);
        if (empty($activeServer)){
            session()->flash('errors',__('server.exception.not found'));
            return $activeServer;
        }
        $formParam['key'] = $activeServer->first()->api_key;
        $client = new \GuzzleHttp\Client();
        $promise = $client->requestAsync('POST', $url, [
            'form_params' => $formParam
        ]);
        $promise->then(function (ResponseInterface $response){
            return $response->getBody();
        }, function (RequestException $exception){
            session()->flash('errors',__("server.exception.{$exception->getCode()}"));
            return $exception->getCode();
        });
        return  $promise;
    }

    public function buildUrl($base, $apiVersion = "v1"){
        $activeServer = $this->activeServer(true);
        if (empty($activeServer)){
            session()->flash('errors',__('server.exception.not found'));
            return $activeServer;
        }
        return $baseurl = $activeServer->server_ip.'/'.$apiVersion;
    }

}
