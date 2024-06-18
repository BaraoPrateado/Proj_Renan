@extends('../layouts/layout-crud')

@section('create')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="card-header font-semibold text-xl text-gray-800 leading-tight text-center">
                    {{ __("Create New product") }}
                </div>
                <div class="card-body">

                    <form action="{{ route('product.store') }}" method="post">
                        {!! csrf_field() !!}

                        <label>{{ __("Name") }}</label></br>
                        <input type="text" name="name" id="name" placeholder="Ex: sabonete" value="{{ old('name') }}" class="form-control"></br>

                        <label>{{ __("Stock") }}</label></br>
                        <input type="number" name="stock" id="stock" placeholder="Ex: 25" value="{{ old('stock') }}" class="form-control"></br>

                        <label>{{ __("Price") }}</label></br>
                        <input type="number" inputmode="decimal" min="0" step="1.00" name="price" id="price" value="{{ old('price') }}"
                            placeholder="Ex: 50.00" class="form-control"></br>

                        <label for="supplier_id">{{ __("Supplier") }}</label></br>
                        <select name="supplier_id" id="supplier_id" class="form-select">
                            <option value="">Selecione</option>

                            @forelse($supplierNames as $supplierName)
                                <option value="{{ $supplierName->id }}" {{ old('supplier_id') == $supplierName->id ? 'selected' : ''}}> {{ $supplierName->name }} </option>
                            @empty
                                <option value="">Nenhum Fornecedor Encontrado</option>
                            @endforelse
                        </select>

                        <br>
                    
                        <a href="{{ route('product.index') }}" class="btn btn-warning">{{ __('Exit') }}</a>
                        <input type="submit" value="{{ __('Save') }}" class="btn btn-success">
                        </br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection