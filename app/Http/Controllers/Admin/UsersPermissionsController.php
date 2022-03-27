<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersPermissionsController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->syncPermissions($request->permissions);

        return back()->withFlash('The permissions has been updated');
    }
}
