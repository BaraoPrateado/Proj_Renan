@extends('../layouts/crud-layout')

@section('edit')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="card-header font-semibold text-xl text-gray-800 leading-tight text-center">{{ __("Edit the Employee") }}</div>
                <div class="card-body">

                    <form action="{{ url('employee/' . $employees->id) }}" method="post">
                        {!! csrf_field() !!}
                        @method("PATCH")

                        <label>{{ __("Name") }}</label></br>

                        <input type="text" name="name" id="name" value="{{ $employees->name }}" class="form-control"></br>

                        <label>CPF</label></br>

                        <input type="text" name="cpf" id="cpf" value="{{ $employees->cpf }}" class="form-control"></br>

                        <label>{{ __("Address") }}</label></br>

                        <input type="text" name="address" id="address" value="{{ $employees->address }}" class="form-control"></br>

                        <input type="submit" value="Save" class="btn btn-success"></br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection