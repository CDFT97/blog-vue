<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        return view('admin.permissions.index', [
            'permissions' => Permission::all()
        ]);
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', [
            'permission' => $permission
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate(['display_name' => 'required']);

        $permission->update($data);

        alert()->success('Permission has been updated', 'Permission updated!');

        return back();
    }
}
