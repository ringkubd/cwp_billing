<?php

namespace App\Http\Controllers\Backend\Auth\Permission;

use App\Events\Backend\Auth\Permission\PermissionDeleteEvent;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\Permission\PermissionRequest;
use App\Http\Requests\Backend\Auth\Permission\PermissionStoreRequest;
use App\Http\Requests\Backend\Auth\Permission\PermissionUpdateRequest;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Repositories\Backend\Auth\RoleRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    protected $permissionRepository;

    protected $roleRepository;

    protected $guards;

    public function __construct(PermissionRepository $permissionRepository, RoleRepository $roleRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->roleRepository = $roleRepository;

        $keys = array_keys(config('auth.guards'));
        $values = array_values($keys);
        $this->guards = array_combine($keys, $values);
    }

    public function index(){
       $permission = $this->permissionRepository->paginate();
       return view('backend.auth.permission.index', compact('permission'));
    }

    public function create(){
        $guards = $this->guards;
        return view('backend.auth.permission.create', compact('guards'));
    }

    public function store(PermissionRepository $repository, PermissionStoreRequest $request){
        $repository->create($request->all());
        return redirect()->route('admin.auth.permission.index')->withFlashSuccess(__('alerts.backend.permissions.created'));
    }

    public function edit(PermissionRequest $request, $id){
        $permission = Permission::findById($id);
        $guards = $this->guards;
        return view('backend.auth.permission.edit', compact('permission', 'guards'));
    }

    public function update(PermissionUpdateRequest $request, Permission $permission){
        $this->permissionRepository->update($permission, $request->only(['name', 'guard_name']));
        return redirect()->route('admin.auth.permission.index')->withFlashSuccess(__('alerts.backend.permissions.updated'));
    }

    public function destroy(PermissionRequest $request, Permission $permission){
        if (!auth()->user()->hasRole(config('access.users.admin_role'))) {
            throw new GeneralException('You can not delete permission.');
        }
        $this->permissionRepository->deleteById($permission->id);

        event(new PermissionDeleteEvent($permission));

        return redirect()->route('admin.auth.permission.index')->withFlashSuccess(__('alerts.backend.permissions.deleted'));
    }
}
