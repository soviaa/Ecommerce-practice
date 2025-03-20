<?php
namespace App\Http\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductServices{

    public function getProduct(){
        return view('products.getProducts',[
            'products'=> Product::all()
        ]);
    }
    public function productForm(){
        return view('products.addProduct',[
            'categories'=> Category::all()
        ]);
    }

    public function addProduct($request){
        try{
            DB::beginTransaction();

            if($request ->hasFile('image')){
                $image = $request->file('image');
                $image_name = time().'.'.$image->getClientOriginalExtension();
                $image->storeAs('/products',$image_name);
            }
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->stock = $request->stock;
            $product->image = $image_name;
            $product->category_id = $request->category_id;
            $product->status = $request->status;


            $product->save();

        }catch(\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
        DB::commit();
        return redirect()->route('products');
    }


    public function editProduct($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('products.editProduct',compact('product','categories'));
    }
    public function updateProduct($request,$id){
        try{
            DB::beginTransaction();
            $product = Product::find($id);

            if($request ->hasFile('image')){
                $old_image = public_path('storage/products/'.$product->image);
                if(file_exists($old_image)){
                    unlink($old_image);
                }
                $image = $request->file('image');
                $image_name = time().'.'.$image->getClientOriginalExtension();
                $image->storeAs('/products',$image_name);
                $product->image = $image_name;
            }
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->stock = $request->stock;
            $product->category_id = $request->category_id;
            $product->status = $request->status;
            $product->save();

        }catch(\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
        DB::commit();
        return redirect()->route('products');
    }


    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
                                ->where('id', '!=', $id)
                                ->take(4)
                                ->get();
        return view('products.singleProduct', compact('product', 'relatedProducts'));
    }
}

