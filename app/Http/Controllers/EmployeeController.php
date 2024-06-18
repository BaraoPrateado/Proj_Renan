<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nome = 'Employee';

        return view('crudEmployee.employee-create', ['nome' => $nome]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validation = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:255', 'unique:'.Employee::class],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $input = Employee::create($validation);
        if ($input) {
            session()->flash('flash_message', 'Funcionário Adicionado com Sucesso');
            return redirect(route('employee.index'));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('employee.create'));
        }
    }

    /**
     * Display the specified resource.
     */
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nome = 'Employee';

        $employee = Employee::find($id);
        return view('crudEmployee.employee-edit', ['employees' => $employee, 'nome' => $nome]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validation = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $employee = Employee::find($id);
        $input = $employee->update($validation);
        if ($input) {
            session()->flash('flash_message', 'Funcionário Adicionado com Sucesso');
            return redirect(route('employee.index'));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('employee.edit'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::destroy($id);
        return redirect('employee')->with('flash_message', 'Employee Deleted!');
    }
}
