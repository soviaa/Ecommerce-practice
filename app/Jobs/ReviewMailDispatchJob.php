<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReviewReceiptMail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ReviewMailDispatchJob implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $users;
    public $product;
    public function __construct($users,$product)
    {
        $this->users = $users;
        $this->product = $product;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->users->user->email)->send(new ReviewReceiptMail($this->users, $this->product));
        // Mail::to(Auth::user()->email)->send(new ReviewReceiptMail($this->users, $this->product));



    }

}
