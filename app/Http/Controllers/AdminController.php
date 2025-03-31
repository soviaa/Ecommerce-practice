<?php

namespace App\Http\Controllers;

use App\Jobs\ReviewMailDispatchJob;
use App\Models\Review;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReviewReceiptMail;


class AdminController extends Controller
{
    public function sendMail()
    {
        Review::with(['user', 'product'])->chunk(50, function ($reviews) {
            foreach ($reviews as $review) {
                ReviewMailDispatchJob::dispatch($review->user, $review->product);
            }
        });

        return redirect()->back()->with('success', 'Mail sent successfully!');
    }

}
