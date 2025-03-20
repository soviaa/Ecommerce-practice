<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        return view('home',[
            'categories'=> Category::with('products')->get(),
        ]);
    }
}
