<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    protected $user, $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;

        $this->middleware('can:users');
    }

    /**
     * Show Roless
     */
    public function roles($idUser)
    {
        if(!$user = $this->user->find($idUser)){
            return redirect()->back();
        }

        //$roles = $user->roles;
        $roles = $user->roles()->paginate();

        return view('admin.pages.users.roles.roles', compact('user','roles'));
    }

    /**
     * Show Role
     */
    public function users($idRole)
    {
        if(!$roles = $this->role->find($idRole)){
            return redirect()->back();
        }

        $users = $roles->users()->paginate();

        return view('admin.pages.roles.users.users', compact('roles','users'));
    }


    /**
     * atrelar as permições aos perfis
     */
    public function rolesAvailable(Request $request, $idUser)
    {
        if(!$user = $this->user->find($idUser)){
            return redirect()->back();
        }

        // Search roles
        $filters = $request->except('_token');

        $roles = $user->rolesAvailable($request->filter);

        return view('admin.pages.users.roles.available', compact('user', 'roles', 'filters'));
    }

    public function attachRolesRole(Request $request, $idUser)
    {
        if(!$user = $this->user->find($idUser)){
            return redirect()->back();
        }

        if(!$request->roles || count($request->roles) == 0){
            return redirect()
                    ->back()
                    ->with('warning', 'Escolha um tipo de permissão.');
        }

        $user->roles()->attach($request->roles);

        return redirect()->route('users.roles', $user->id);
    }

    /**
     * Detach role user
     */
    public function detachRoleUser($idUser, $idRole)
    {
        $user = $this->user->find($idUser);
        $role = $this->role->find($idRole);

        if(!$user || !$role){
            return redirect()->back();
        }

        $user->roles()->detach($role);

        return redirect()->route('users.roles', $user->id);
    }
}
