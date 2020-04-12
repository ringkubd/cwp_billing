<?php

namespace App\Repositories\Backend\Auth;

use App\Events\Backend\Auth\Permission\PermissionCreateEvent;
use App\Events\Backend\Auth\Permission\PermissionUpdateEvent;
use App\Events\Backend\Auth\Role\RoleCreated;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseRepository
{
    /**
     * PermissionRepository constructor.
     *
     * @param  Permission  $model
     */
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return Permission
     * @throws GeneralException
     * @throws \Throwable
     */

    public function create(array $data): Permission{
        if (!auth()->user()->hasRole(config('access.users.admin_role'))) {
            throw new GeneralException('You can not edit the administrator permission.');
        }

        if ($this->permissionExists($data['name'])){
            throw new GeneralException('A permission already exists with the name '.$data['name']);
        }

        return \DB::transaction(function () use ($data) {
            $permission = $this->model::create(['name' => strtolower($data['name']), 'guard_name'=>strtolower($data['guard_name'])]);

            if ($permission) {

                event(new PermissionCreateEvent($permission));

                return $permission;
            }

            throw new GeneralException(trans('exceptions.backend.access.permission.create_error'));
        });
    }

    public function update(Permission $permission, array $data){
        if (!auth()->user()->hasRole(config('access.users.admin_role'))) {
            throw new GeneralException('You can not edit the administrator role.');
        }

        if ($permission->name !== strtolower($data['name'])){
            if ($this->permissionExists($data['name'])){
                throw new GeneralException('A permission already exists with the name '.$data['name']);
            }
        }
        return \DB::transaction(function () use ($permission, $data) {
            $permission = $permission->update(['name' => strtolower($data['name']), 'guard_name'=>strtolower($data['guard_name'])]);

            if ($permission) {

                event(new PermissionUpdateEvent($permission));

                return $permission;
            }

            throw new GeneralException(trans('exceptions.backend.access.permission.create_error'));
        });
    }

    /**
     * @param $name
     * @return bool
     */

    protected function permissionExists($name): bool {
        return $this->model
            ->where('name', strtolower($name))
            ->count() > 0;
    }

}
