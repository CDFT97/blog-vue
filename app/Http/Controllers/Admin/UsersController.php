<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserWasCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Scope para el permiso (En el modelo)
        $users = User::allowed()->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;

        $this->authorize('create', $user);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        
        return view('admin.users.create', compact('user', 'roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new User);

       //Generar formulario
       $data = $request->validate([
           'name' => 'required|max:255',
           'email' => 'required|max:255|unique:users'
       ]);
       //Generar contraseña
       $data['password'] = str_random(8);
       //Crear usuario
       $user = User::create($data);

       //Asignar roles
       $user->assignRole($request->roles);
       //Asignar permisos
       $user->givePermissionTo($request->permissions);
       //Enviar email con datos de acceso
       UserWasCreated::dispatch($user, $data['password']);

       //regresar respuesta al usuario
       return redirect()->route('admin.users.index')->withFlash('The user has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $roles = Role::with('permissions')->get();
        $permissions = Permission::orderBy('id', 'asc')->pluck('name', 'id');

        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        
        $this->authorize('update', $user);

        $user->update( $request->validated() );

        alert()->success('User has been updated', 'User updated');

        return redirect()->route('admin.users.edit', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        alert()->success('User has been deleted', 'User deleted');

        return redirect()->route('admin.users.index');
    }
}
