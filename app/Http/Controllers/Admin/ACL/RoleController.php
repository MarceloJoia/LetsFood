<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRole;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $repository;

    public function __construct(Role $role)
    {
        $this->repository = $role;

        $this->middleware(['can:roles']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$roles = $this->repository->latest()->paginate(10)){
            return redirect()->back();
        }

        return view('admin.pages.roles.index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreUpdateRole  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRole $request)
    {
        if(!$this->repository->create($request->all())){
            return redirect()->back();
        }

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$role = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.roles.show',[
           'role' => $role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$role = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreUpdateRole  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRole $request, $id)
    {
        if(!$role = $this->repository->find($id)){
            return redirect()->back();
        }

        $role->update($request->all());

        return redirect()->route('roles.show', $role->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$role = $this->repository->find($id)){
            return redirect()->back();
        }

        $role->delete();

        return redirect()->route('roles.index');
    }

    /**
     * Seacrh roles
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $roles = $this->repository->where( function($query) use($request) {
            if($request->filter){
                $query->where('name', $request->filter);
                $query->orWhere('description', 'LIKE', "%{$request->filter}%");
            }
        })->paginate(10);

        return view('admin.pages.roles.index', [
            'roles' => $roles,
            'filters'  => $filters,
        ]);
    }
}
