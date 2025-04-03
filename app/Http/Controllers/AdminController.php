<?php

namespace App\Http\Controllers;

use App\Jobs\ReviewMailDispatchJob;
use App\Models\Review;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReviewReceiptMail;
use App\Models\User;
use App\Models\Role;



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
       
        $user->roles()->attach($role);
        return response()->json([
            'message' => 'Role assigned successfully',
            'user' => $user,
            'role' => $role,
        ]);
    }
}
