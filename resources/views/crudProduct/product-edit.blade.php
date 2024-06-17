@extends('../layouts/crud-layout')

@section('edit')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="card-header font-semibold text-xl text-gray-800 leading-tight text-center">
                    {{ __("Edit the product") }}</div>
                <div class="card-body">

                    <form action="{{ route('product.update', ['product' => $products->id]) }}" method="post">
                        {!! csrf_field() !!}
                        @method("PATCH")

                        <label>{{ __("Name") }}</label></br>
                        <input type="text" name="name" id="name" value="{{ $products->name }}"
                            class="form-control"></br>

                        <label>{{ __("Stock") }}</label></br>
                        <input type="number" name="stock" id="stock"
                            value="{{ $products->stock }}" class="form-control"></br>

                        <label>{{ __("Price") }}</label></br>
                        <input type="number" inputmode="decimal" min="0" name="price" id="price" value="{{ $products->price }}"
                            class="form-control"></br>

                        <input type="submit" value="{{ __('Save') }}" class="btn btn-success">
                        <a href="{{ route('product.index') }}" class="btn btn-warning">{{ __('Exit') }}</a>
                        </br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection