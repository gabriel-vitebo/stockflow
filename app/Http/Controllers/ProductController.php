<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('products.index', [
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        $newProduct = new Product();

        $newProduct->name = $validated['name'];
        $newProduct->sku = $validated['sku'];
        $newProduct->price = $validated['price'];
        $newProduct->quantity = $validated['quantity'];

        $newProduct->save();

        return redirect('/products');
    }

    public function getProduct($id)
    {
        $product = Product::find($id);

        return view('products.product', [
            'product' => $product,
            'id' => $id
        ]);
    }

    public function editProduct($id, Request $request)
    {
        $product = Product::find($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => [
                'required',
                'string',
                Rule::unique('products', 'sku')->ignore($product->id),
            ],
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);


        $product->update($validated);
        return redirect('/products');
    }
}
