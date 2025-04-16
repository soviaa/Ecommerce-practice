<?php

namespace App\Http\Controllers;

use App\Jobs\ReviewMailDispatchJob;
use App\Models\Review;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function sendMail()
    {
        // Review::with(['user', 'product'])->chunk(50, function ($reviews) {
        //     foreach ($reviews as $review) {
        //         ReviewMailDispatchJob::dispatch($review->user, $review->product);
        //     }
        // });
        $users = Review::with('user')->get();
        foreach ($users as $user) {
            ReviewMailDispatchJob::dispatch($user, $user->product);
        }
        return redirect()->back()->with('success', 'Mail sent successfully!');
    }

    public function assignRole(User $user, Role $role)
    {
        $user->roles()->sync($role);

        return redirect()->back()->with('success', 'Role assigned successfully!');
    }

    public function getUsers()
    {
        $users = User::with('roles')->get();
        return view('admin.userList', compact('users'), [
            'roles' => Role::all(),
        ]);
    }
    public function assignPermission(Role $role, Permission $permission)
    {
        $role->permissions()->sync($permission);

        return redirect()->back()->with('success', 'Permission assigned successfully!');
        // return response()->json([
        //     'success' => 'success',
        //     'message' => 'Permission assigned successfully!',
        //     'role' => $role,
        //     'permission' => $permission,

        // ]);
    }
    public function updatePermission(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        $permissions = $request->permissions ?? []; 
    
        $role->permissions()->sync($permissions);
    
        return redirect()->back()->with('success', 'Permissions updated successfully!');
    }
    


    public function getPermission()
    {
        return view('admin.settings', [
            'permissions' => Permission::all(),
            'roles' => Role::all(),
        ]);
    }
}
