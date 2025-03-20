<?php
namespace App\Http\Services;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryServices
{
    public function category()
    {
        return view('category');
    }
    public function addCategory($request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->save();
        return $category;
    }

}
