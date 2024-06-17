<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('product', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crudProduct.product-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer', 'max:9999'],
            'price' => ['required', 'max:9999'],
        ]);

        $input = $request->all();
        Product::create($input);

        return redirect('product')->with('flash_message', 'Product Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('crudProduct.product-edit', ['products' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer', 'max:9999'],
            'price' => ['required', 'max:9999'],
        ]);
        
        $product = Product::find($id);
        $input = $request->all();
        $product->update($input);
        return redirect('product')->with('flash_message', 'Product Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect('product')->with('flash_message', 'Product Deleted!');
    }
}
