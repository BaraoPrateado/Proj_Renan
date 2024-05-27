<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row" style="margin:20px">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                            {{ __('Employees CRUD') }}
                        </h2>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('employee.create') }}" class="btn btn-success btn-sm"
                            title="Add New Employee">
                            {{ __('Add New') }}
                        </a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Name')}}</th>
                                        <th>CPF</th>
                                        <th>{{ __('Address')}}</th>
                                        <th>{{ __('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->cpf }}</td>
                                            <td>{{ $employee->address }}</td>

                                            <td>
                                                <a href="{{ url('/student/' . $employee->id) }}" title="View Student">
                                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                            aria-hidden="true"></i>
                                                        View
                                                    </button>
                                                </a>
                                                <a href="{{ url('/student/' . $employee->id . '/edit') }}"
                                                    title="Edit Student">
                                                    <button class="btn btn-primary btn-sm">

                                                        Edit
                                                    </button>
                                                </a>
  
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>