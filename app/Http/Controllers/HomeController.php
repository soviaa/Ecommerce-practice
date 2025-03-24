<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Carousel;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'categories' => Category::with('products')->get(),
            'carousels' => Carousel::all(),
        ]);
    }
    public function showCarousel()
    {
        return view('admin.showCarousel', [
            'carousels' => Carousel::all()
        ]);
    }

    public function addCarousel()
    {
        return view('admin.addCarousel');
    }
    public function storeCarousel(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/carousels', $image_name);
        }
        Carousel::create([
            'title' => $request->title,
            'image' => $image_name,
        ]);

        return redirect()->route('dashboard');
    }
    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);
        Storage::delete('public/carousels/' . $carousel->image);
        $carousel->delete();

        return redirect()->route('carousel.index')->with('success', 'Image removed from carousel.');
    }

   
}
