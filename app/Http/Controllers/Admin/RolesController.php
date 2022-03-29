<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles',
            'display_name' => 'required|unique:roles',
        ],[
            'display_name.required' => 'The name field is required.',
            'display_name.unique' => 'The name has already been taken.',
            'name.required' => 'The identifier field is required.',
            'name.unique' => 'The identifier has already been taken.',
        ]);
        $permissions = $request->permissions;
        $role = Role::create($data);

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
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'display_name' => 'required|unique:roles,display_name,' . $role->id,
        ],[
            'display_unique' => 'The name has already been taken.',
            'display_name.required' => 'The name field is required.'
        ]);

        
        $role->update($data);
        
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
    public function destroy($id)
    {
        //
    }
}
