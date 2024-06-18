@extends('../layouts/layout-crud')

@section('edit')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="card-header font-semibold text-xl text-gray-800 leading-tight text-center">
                    {{ __("Edit the supplier") }}
                </div>
                <div class="card-body">

                    <form action="{{ route('supplier.update', ['supplier' => $suppliers->id]) }}" method="post">
                        {!! csrf_field() !!}
                        @method("PATCH")

                        <label>{{ __("Name") }}</label></br>
                        <input type="text" name="name" id="name" value="{{ old('name', $suppliers->name) }}"
                            class="form-control"></br>
                        <div>
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                                <br> <br>
                            @enderror
                        </div>

                        <label>CNPJ</label></br>
                        <input x-data type="text" name="cnpj" id="cnpj" x-mask="99.999.999/9999-99" id="stock"
                            value="{{ old('cnpj', $suppliers->cnpj) }}" class="form-control"></br>
                        <div>
                            @error('cnpj')
                                <span class="text-danger">{{$message}}</span>
                                <br> <br>
                            @enderror
                        </div>

                        <label>{{ __("Address") }}</label></br>
                        <input type="text" name="address" id="price" value="{{ old('address', $suppliers->address) }}"
                            class="form-control"></br>
                        <div>
                            @error('address')
                                <span class="text-danger">{{$message}}</span>
                                <br> <br>
                            @enderror
                        </div>

                        <a href="{{ route('supplier.index') }}" class="btn btn-warning">{{ __('Exit') }}</a>
                        <input type="submit" value="{{ __('Save') }}" class="btn btn-success">
                        </br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection