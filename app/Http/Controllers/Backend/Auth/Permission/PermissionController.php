<?php

namespace App\Http\Controllers\Backend\Auth\Permission;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Repositories\Backend\Auth\RoleRepository;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permissionRepository;

    protected $roleRepository;

    public function __construct(PermissionRepository $permissionRepository, RoleRepository $roleRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index(){
       $permission = $this->permissionRepository->get();
       return view('backend.auth.permission.index');
    }

    public function create(){

    }

    public function store(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }
}
