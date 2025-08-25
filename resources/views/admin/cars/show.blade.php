@extends('includes.body')

@section('content')
<div class="window-container">
    <div class="window-title-bar shadow">
        <x-feathericon-menu class="window-title-icon"/>
    </div>
    <div class="window-body shadow p-4">
        <div class="form-container border">
            <form method="POST">
                <div class="row pt-0">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Nombre</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" value="{{ isset($client) ? $client->name : '' }}" disabled>
                                    <span class="input-group-text">
                                        <a href="#">Editar</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label>Correo</label>
                                <input type="text" class="form-control" name="email" value="{{ isset($client) ? $client->email : '' }}" disabled>
                            </div>                
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label>Telefono</label>
                                <input type="text" class="form-control" name="phone" value="{{ isset($client) ? $client->phone : '' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label>Codigo Postal</label>
                                <input type="text" class="form-control" id="postcode" name="postcode" value="{{ isset($client) ? $client->postcode : '' }}" disabled>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label>RFC</label>
                                <input type="text" class="form-control" name="rfc" value="{{ isset($client) ? $client->rfc : '' }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Dirección</label>
                                <input type="text" class="form-control" name="street" value="{{ isset($client) ? $client->street : '' }}" disabled>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label>Colónia</label>
                                <select class="form-select" id="address" name="address" disabled>
                                    @if ( isset($client) )
                                        <option>{{ $client->address }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3"> 
                            <div class="col-md-6">
                                <label>Ciudad</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ isset($client) ? $client->city : '' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label>Estado</label>
                                <input type="text" class="form-control" id="state" name="state" value="{{ isset($client) ? $client->state : '' }}" disabled>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label>Comentarios</label>
                                <textarea class="form-control" disabled>{{ isset($client) ? $client->comments : '' }}</textarea>
                            </div>
                        </div>
                    </div>                
                </div>
            </form>
        </div>

        <div class="form-container border">
            <form method="POST">
                <div class="row pt-0">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Marca</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ isset($client) ? $client->brand : '' }}" disabled>
                                    <span class="input-group-text">
                                        <a href="#">Editar</a>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label>Modelo</label>
                                    <input type="text" class="form-control" value="{{ isset($client) ? $client->model : '' }}" disabled>
                                </div>
                            </div>                        
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label>Serie (VIN)</label>
                                <input type="text" class="form-control" value="{{ isset($client) ? $client->serie : '' }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Año</label>
                                <input type="text" class="form-control" value="{{ isset($client) ? $client->year : '' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label>Placa</label>
                                <input type="text" class="form-control" value="{{ isset($client) ? $client->plate : '' }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-12 pb-2">
            <table class="table table-hover border bg-white" id="table-items">
                <thead>
                    <th>Servicio / Falla</th>
                    <th>Tipo de servicio</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>Status</th>
                    <th class="text-end">Total</th>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>
                                <a href="{{ route('services.show', $service->id) }}">{{ Str::limit($service->fault, 80) }}</a>
                            </td>
                            <td>{{ $service->service_type }}</td>
                            <td>{{ Carbon\Carbon::parse($service->entry_date)->format('d-m-Y') }}</td>
                            <td>{{ isset($service->finished_date) ? Carbon\Carbon::parse($service->finished_date)->format('d-m-Y') : '' }}</td>
                            <td>
                                @if ($service->status == 'Finalizado')
                                    <span class="badge text-bg-success">{{ $service->status }}</span>    
                                @else
                                    <span class="badge text-bg-warning">{{ $service->status }}</span>
                                @endif
                            </td>
                            <td class="text-end">{{  '$'.number_format($service->total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-md-6 mt-3">
                <x-feathericon-clipboard class="table-icon" style="margin-top:-4px;"/>
                @if (count($services) > 1)
                    Se encontraron {{ count($services) }} registros.
                @else 
                    Se encontro {{ count($services) }} registro.
                @endif
            </div>
            <div class="col-md-6 mt-3 text-end" style="padding-right: 40px;">
                <a href="{{ route('cars.index') }}" class="btn btn-sm btn-success">Atras</a>
                <a href="{{ route('finance', $client->id) }}" class="btn btn-sm btn-success">Mas Información</a>
            </div>
        </div>
    </div>
</div>
@endsection