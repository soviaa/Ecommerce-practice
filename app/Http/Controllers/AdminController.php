<?php

namespace App\Http\Controllers;

use App\Jobs\ReviewMailDispatchJob;
use App\Models\Review;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

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
    public function assignPermission(User $user, Permission $permission)
    {
        $user->permissions()->sync($permission);

        return redirect()->back()->with('success', 'Permission assigned successfully!');
    }
}
