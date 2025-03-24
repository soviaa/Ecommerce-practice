<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ReviewService;


class ReviewController extends Controller
{
    public $review;
    public function __construct(ReviewService $reviewService)
    {
        $this->review = $reviewService;
    }
    public function store(Request $request, $productId)
    {
        return $this->review->store($request, $productId);
    }
    // public function averageRating($productId)
    // {
    //     return $this->review->averageRating($productId);
    // }

    // public function index($productId)
    // {
    //     $product = Product::with('reviews.user')->findOrFail($productId);
    //     dd($product);
    //     return view('products.show', compact('product'));
    // }
}
