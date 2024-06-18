<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();

        return view('supplier', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nome = 'Supplier';
        
        return view('crudSupplier.supplier-create', ['nome' => $nome]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.Supplier::class],
            'cnpj' => ['required', 'string', 'max:255',],
            'address' => ['required', 'string', 'max:255',],
        ]);

        $input = $request->all();
        Supplier::create($input);

        return redirect('supplier')->with('flash_message', 'Supplier Added!');
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
        $nome = 'Supplier';
        $supplier = Supplier::find($id);
        return view('crudSupplier.supplier-edit', ['suppliers' => $supplier, 'nome' => $nome]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cnpj' => ['required', 'string', 'max:255',],
            'address' => ['required', 'string', 'max:255',],
        ]);
        
        $supplier = supplier::find($id);
        $input = $request->all();
        $supplier->update($input);
        return redirect('supplier')->with('flash_message', 'Supplier Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Supplier::destroy($id);
        return redirect('supplier')->with('flash_message', 'Supplier Deleted!');
    }
}
