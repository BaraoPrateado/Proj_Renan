@extends('../layouts/crud-layout')

@section('create')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="card-header font-semibold text-xl text-gray-800 leading-tight text-center">{{ __("Create New Employee") }}</div>
                <div class="card-body">

                    <form action="{{ route('employee.store') }}" method="post">
                        {!! csrf_field() !!}
                        
                        <label>{{ __("Name") }}</label></br>

                        <input type="text" name="name" id="name" placeholder="Ex: João" class="form-control"></br>
                        <label>CPF</label></br>

                        <input x-data type="text" name="cpf" id="cpf" x-mask="999.999.999-99" placeholder="Ex: 999.999.999-99" class="form-control"></br>

                        <label>{{ __("Address") }}</label></br>

                        <input type="text" name="address" id="address" placeholder="Ex: Rua Antonio" class="form-control"></br>

                        <input type="submit" value="{{ __('Save') }}" class="btn btn-success"></br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection