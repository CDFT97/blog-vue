<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        $this->authorize('view', new Permission );

        return view('admin.permissions.index', [
            'permissions' => Permission::all()
        ]);
    }

    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission );

        return view('admin.permissions.edit', [
            'permission' => $permission
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission );

        $data = $request->validate(['display_name' => 'required']);

        $permission->update($data);

        alert()->success('Permission has been updated', 'Permission updated!');

        return back();
    }
}
