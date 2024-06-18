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

        return view('product', ['products' => $products])->with('product');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nome = 'Product';
        $supplierNames = Supplier::orderBy('name', 'asc')->get();

        return view('crudProduct.product-create',  [
            'supplierNames' => $supplierNames,
            'nome' => $nome
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validation = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.Product::class],
            'stock' => ['required', 'integer', 'max:9999'],
            'price' => ['required', 'max:9999'],
            'supplier_id' => ['required'],
        ]);

        $input = Product::create($validation);
        if ($input) {
            session()->flash('flash_message', 'Produto Adicionado com Sucesso');
            return redirect(route('product.index'));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('product.create'));
        }
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
        $nome = 'Product';
        $supplierNames = Supplier::orderBy('name', 'asc')->get();
        $product = Product::find($id);


        return view('crudProduct.product-edit', [
            'products' => $product,
            'supplierNames' => $supplierNames,
            'nome' => $nome,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer'],
            'price' => ['required'],
            'supplier_id' => ['required'],
        ]);

        $product = Product::find($id);
        $input = $product->update($validation);

        if ($input) {
            session()->flash('flash_message', 'Produto Adicionado com Sucesso');
            return redirect(route('product.index'));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('product.edit'));
        }
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
