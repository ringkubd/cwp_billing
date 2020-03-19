<?php


namespace App\Repositories\Backend\Server;


use App\Events\Backend\Server\ServerCreated;
use App\Events\Backend\Server\ServerUpdateEvent;
use App\Exceptions\GeneralException;
use App\Models\Server\ServerInformation;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class ServerManagementRepository extends BaseRepository
{
    protected $model;

    public function __construct(ServerInformation $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return ServerInformation
     * @throws \Throwable
     */

    public function create(array $data): ServerInformation
    {
        return DB::transaction(function () use ($data) {
            $server = $this->model::create($data);
            event(new ServerCreated($server));
            return $server;
            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param $serverId
     * @return ServerInformation
     */

    public function enable($serverId) : ServerInformation{
        $userid = \Auth::user()->name;
        $server = $this->model->find($serverId);
        if ($server->enable){
            logger("{$server->name} enable by {$userid}");
            $server->update(['enable'=>0]);
        }else{
            logger("{$server->name} disable by {$userid}");
            $server->update(['enable'=>1]);
        }
        event(new ServerUpdateEvent($server));
        return $server;
    }

    /**
     * @param $serverId
     * @return ServerInformation
     */

    public function secure($serverId) : ServerInformation {
        $userid = \Auth::user()->name;
        $server = $this->model->find($serverId);
        if ($server->secureConnection){
            logger("{$server->name} ssl enable by {$userid}");
            $server->update(['secureConnection'=>0]);
        }else{
            logger("{$server->name} ssl disable by {$userid}");
            $server->update(['secureConnection'=>1]);
        }
        event(new ServerUpdateEvent($server));
        return $server;
    }

    public function update(array $data): bool {
        return DB::transaction(function () use($data){
            $server = $this->model->find($data['id']);
            $update = $server->update($data);
            event(new ServerUpdateEvent($server));
            return $update;
            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

}
