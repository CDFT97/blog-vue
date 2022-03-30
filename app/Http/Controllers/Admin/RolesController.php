<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRolesRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index', [ 'roles' => Role::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create', [
            'role' => new Role,
            'permissions' => Permission::orderBy('id', 'asc')->pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {

        $permissions = $request->permissions;
        $role = Role::create($request->validated());

        if($request->has('permissions')):
            $role->givePermissionTo($permissions);
        endif;

        alert()->success('Role has been created', 'Role created!');

        return redirect()->route('admin.roles.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('id', 'asc')->pluck('name', 'id');
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, Role $role)
    {

        $role->update( $request->validated() );
        
        $role->permissions()->detach();
        
        if($request->has('permissions')):
            $role->givePermissionTo($request->permissions);
        endif;
        
        alert()->success('Role has been updated', 'Role updated!');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->id === 1):
            //Evita que se pueda eliminar el rol admin
            throw new \Illuminate\Auth\Access\AuthorizationException('This role cant be deleted');
        endif;
        
        $role->delete();
        alert()->success('Role has been deleted', 'Role deleted!');

        return redirect()->route('admin.roles.index');
    }
}
