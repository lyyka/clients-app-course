<?php

namespace App\Services;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;

class ProductService
{
    public function storeProduct(ProductStoreRequest $request, Product $product)
    {
        $product->enabled = $request->input('enabled');
        $product->name = $request->input('name');
        $product->save();
    }
}
