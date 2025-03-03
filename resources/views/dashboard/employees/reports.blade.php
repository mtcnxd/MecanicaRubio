@extends('includes.body')

@section('menu')
@include('includes.menu')
@endsection

@section('content')
<div class="main-content">
    <div class="row">

        <div class="col-md-6">
            <div class="card p-2">
                <div class="card-body p-1 row">
                    <div class="col">
                        <select name="employee" id="employee" class="form-select">
                            <option value="">- Seleccione un empleado -</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->user_id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success" id="search">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection


@section('js')
<script>
    let search = document.getElementById('search');
    search.addEventListener('click', (btn) => {
        let employee = document.getElementById('employee').value;
        
        $.$.ajax({
            type: "GET",
            url: "url",
            data: "data",
            dataType: "dataTpye",
            success: function (response, textStatus, jqXHR) {
                //Do anything
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.table(jqXHR)
            }
        });
    })
</script>
@endsection