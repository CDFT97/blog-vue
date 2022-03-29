<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersRolesController extends Controller
{
    
    public function update(Request $request, User $user)
    {
        $user->syncRoles($request->roles);

        alert()->success('The user roles has been updated', 'Roles updated');

        return back();
    }

}
