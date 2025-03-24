<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ProductServices;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public $product;
    public function __construct(ProductServices $productServices)
    {
        $this->product = $productServices;

    }
    public function getProduct(){
        return $this->product->getProduct();
    }
    public function productForm()
    {
        return $this->product->productForm();
    }
    public function addProduct(ProductRequest $request)
    {
        return $this->product->addProduct($request);
    }
    public function editProduct($id)
    {
        return $this->product->editProduct($id);
    }
    public function updateProduct(Request $request, $id)
    {
        return $this->product->updateProduct($request, $id);
    }
    public function deleteProduct($id)
    {
        return $this->product->deleteProduct($id);
    }
    public function show($id)
    {
        return $this->product->show($id);
    }

    
}
