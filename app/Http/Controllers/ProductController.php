<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return view('products.index')->with([
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function edit(Request $request, Product $product)
    {
        return view('products.edit')->with([
            'product' => $product,
        ]);
    }

    public function store(ProductStoreRequest $request)
    {
        $service = new ProductService();
        $service->storeProduct($request, new Product());

        return redirect()->route('products.index');
    }

    public function update(ProductStoreRequest $request, Product $product)
    {
        $service = new ProductService();
        $service->storeProduct($request, $product);

        return redirect()->route('products.index');
    }

    public function destroy(Request $request, Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
