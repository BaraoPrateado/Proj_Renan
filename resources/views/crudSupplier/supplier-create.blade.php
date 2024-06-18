@extends('../layouts/layout-crud')

@section('create')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="card-header font-semibold text-xl text-gray-800 leading-tight text-center">{{ __("Create New supplier") }}</div>
                <div class="card-body">

                    <form action="{{ route('supplier.store') }}" method="post">
                        {!! csrf_field() !!}
                        
                        <label>{{ __("Name") }}</label></br>
                        <input type="text" name="name" id="name" placeholder="Ex: sabonete" class="form-control"></br>
                        @error('name')
                                    <span class="text-danger">{{$message}}</span>
                        @enderror
                        <label>CNPJ</label></br>
                        <input x-data type="text" name="cnpj" id="cnpj" x-mask="99.999.999/9999-99" placeholder="Ex: 99.999.999/9999-99" class="form-control"></br>

                        <label>{{ __("Address") }}</label></br>
                        <input type="text" name="address" id="address" placeholder="Ex: Rua Antonio" class="form-control"></br>

                        <input type="submit" value="{{ __('Save') }}" class="btn btn-success">  
                        <a href="{{ route('supplier.index') }}" class="btn btn-warning">{{ __('Exit') }}</a>
                        </br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection