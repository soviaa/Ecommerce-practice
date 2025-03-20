<?php
namespace App\Http\Services;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewService{
    public function store($request, $productId)
    {
        $request->validate([
            'review' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to submit a review.');
        }

        $product = Product::findOrFail($productId);

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Review submitted successfully.');
    }
}
