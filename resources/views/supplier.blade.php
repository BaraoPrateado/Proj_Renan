<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Supplier') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row" style="margin:20px">
            <div class="col-12">



                <div class="card">

                    <div class="card-header">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                            {{ __('Suppliers CRUD') }}
                        </h2>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('supplier.create') }}" class="btn btn-success btn-sm"
                            title="Add New Supplier">
                            {{ __('Add New') }}
                        </a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>CNPJ</th>
                                        <th>{{ __('Address') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($suppliers->count() > 0)
                                        @foreach ($suppliers as $supplier)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $supplier->name }}</td>
                                                <td>{{ $supplier->cnpj }}</td>
                                                <td>{{ $supplier->address }}</td>

                                                <td>
                                                    <a href="{{ route('supplier.edit', ['supplier' => $supplier->id]) }}"
                                                        title="Edit supplier">
                                                        <button class="btn btn-warning btn-sm">
                                                            {{ __('Edit') }}
                                                        </button>
                                                    </a>

                                                    <form method="POST"
                                                        action="{{ route('supplier.destroy', ['supplier' => $supplier->id]) }}"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete supplier"
                                                            onclick="return confirm('{{ __('Confirm delete?') }}')">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="5">{{ __('Suppliers not found!') }}</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>