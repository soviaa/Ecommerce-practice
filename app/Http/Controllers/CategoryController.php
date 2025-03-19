<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CategoryServices;

class CategoryController extends Controller
{
    public $category;
    public function __construct(CategoryServices $categoryServices)
    {
        $this->category = $categoryServices;

    }
    public function category()
    {
        return $this->category->category();
    }
    public function addCategory(Request $request)
    {
        return $this->category->addCategory($request);
    }
}
