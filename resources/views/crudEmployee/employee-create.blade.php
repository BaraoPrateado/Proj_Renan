@extends('../layouts/layout-crud')

@section('create')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="card-header font-semibold text-xl text-gray-800 leading-tight text-center">
                    {{ __("Create New Employee") }}
                </div>
                
                <div class="card-body">

                    <form action="{{ route('employee.store') }}" method="post">
                        {!! csrf_field() !!}

                        <label>{{ __("Name") }}</label></br>
                        <input type="text" name="name" id="name" placeholder="Ex: João" value="{{old('name')}}"
                            class="form-control"></br>
                        <div>
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                                <br> <br>
                            @enderror
                        </div>

                        <label>CPF</label></br>
                        <input x-data type="text" name="cpf" id="cpf" x-mask="999.999.999-99"
                            placeholder="Ex: 999.999.999-99" value="{{ old('cpf') }}" class="form-control"></br>
                        <div>
                            @error('cpf')
                                <span class="text-danger">{{$message}}</span>
                                <br> <br>
                            @enderror
                        </div>

                        <label>{{ __("Address") }}</label></br>
                        <input type="text" name="address" id="address" placeholder="Ex: Rua Antonio"
                            value="{{ old('address') }}" class="form-control"></br>
                        <div>
                            @error('address')
                                <span class="text-danger">{{$message}}</span>
                                <br> <br>
                            @enderror
                        </div>

                        <a href="{{ route('employee.index') }}" class="btn btn-warning">{{ __('Exit') }}</a>
                        <input type="submit" value="{{ __('Save') }}" class="btn btn-success">
                        </br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection