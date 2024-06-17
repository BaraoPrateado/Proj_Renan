<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row" style="margin:20px">
            <div class="col-12">



                <div class="card">

                    <div class="card-header">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                            {{ __('Products CRUD') }}
                        </h2>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('product.create') }}" class="btn btn-success btn-sm"
                            title="Add New Product">
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
                                        <th>{{ __('Stock') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Supplier') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($products->count() > 0)
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->stock }}</td>
                                                <td>R$ {{ $preco_formatado = number_format($product->price, 2, ',', '.') }}</td>
                                                <td>{{ $product->supplier_id }}</td>

                                                <td>
                                                    <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                                        title="Edit Product">
                                                        <button class="btn btn-warning btn-sm">
                                                            {{ __('Edit') }}
                                                        </button>
                                                    </a>

                                                    <form method="POST"
                                                        action="{{ route('product.destroy', ['product' => $product->id]) }}"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Product"
                                                            onclick="return confirm('{{ __('Confirm delete?') }}')">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="6">{{ __('Products not found!') }}</td>
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