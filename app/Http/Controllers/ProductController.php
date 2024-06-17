<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $supplier = Product::with('supplier')->get();

        return view('product', ['products' => $products, 'supplier' => $supplier])->with('product');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplierNames = Supplier::orderBy('name', 'asc')->get();

        return view('crudProduct.product-create',  [
            'supplierNames' => $supplierNames,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.Product::class],
            'stock' => ['required', 'integer', 'max:9999'],
            'price' => ['required', 'max:9999'],
            'supplier_id' => ['required'],
        ]);

        $product = Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'supplier_id' => $request->supplier_id
        ]);

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
        $supplierNames = Supplier::orderBy('name', 'asc')->get();
        $product = Product::find($id);


        return view('crudProduct.product-edit', [
            'products' => $product,
            'supplierNames' => $supplierNames,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.Product::class],
            'stock' => ['required', 'integer', 'max:9999'],
            'price' => ['required', 'max:9999'],
            'supplier_id' => ['required'],
        ]);

        $product = Product::find($id);

        $product->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'supplier_id' => $request->supplier_id,
        ]);

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
