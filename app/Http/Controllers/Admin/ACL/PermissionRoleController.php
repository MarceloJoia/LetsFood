<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    protected $role, $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;

        $this->middleware('can:Cargos');
    }

    /**
     * Show Permissions
     */
    public function permissions($idRole)
    {
        if(!$role = $this->role->find($idRole)){
            return redirect()->back();
        }

        //$permissions = $role->permissions;
        $permissions = $role->permissions()->paginate();

        return view('admin.pages.roles.permissions.permissions', compact('role','permissions'));
    }

    /**
     * Show Role
     */
    public function roles($idPermission)
    {
        if(!$permissions = $this->permission->find($idPermission)){
            return redirect()->back();
        }

        $roles = $permissions->roles()->paginate();

        return view('admin.pages.permissions.roles.roles', compact('permissions','roles'));
    }


    /**
     * atrelar as permições aos perfis
     */
    public function permissionsAvailable(Request $request, $idRole)
    {
        if(!$role = $this->role->find($idRole)){
            return redirect()->back();
        }

        // Search permissions
        $filters = $request->except('_token');

        $permissions = $role->permissionsAvailable($request->filter);

        return view('admin.pages.roles.permissions.available', compact('role', 'permissions', 'filters'));
    }

    public function attachPermissionRole(Request $request, $idRole)
    {
        if(!$role = $this->role->find($idRole)){
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions) == 0){
            return redirect()
                    ->back()
                    ->with('warning', 'Escolha um tipo de permissão.');
        }

        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.permissions', $role->id);
    }

    /**
     * Detach permission role
     */
    public function detachPermissionRole($idRole, $idPermission)
    {
        $role = $this->role->find($idRole);
        $permission = $this->permission->find($idPermission);

        if(!$role || !$permission){
            return redirect()->back();
        }

        $role->permissions()->detach($permission);

        return redirect()->route('roles.permissions', $role->id);
    }
}
