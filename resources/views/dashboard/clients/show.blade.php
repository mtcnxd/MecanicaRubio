@extends('includes.body')

@section('content')
<div class="window-container">
    @include('includes.alert')    
    <h6 class="window-title-bar text-uppercase fw-bold">Cliente #{{ $client->id }}</h6>
    <div class="window-body shadow p-4 bg-white">
        <label class="window-body-form">Información del cliente</label>
        <form action="" method="POST" class="border pt-4 pb-4">
            <div class="row pt-0 p-4 pb-0">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Nombre</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" value="{{ isset($client) ? "#".$client->id ." - ". $client->name : '' }}" disabled>
                                <span class="input-group-text">
                                    <a href="{{ route('clients.edit', $client->id) }}">Editar</a>
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
                            <textarea class="form-control" rows="4" name="comments" disabled>{{ isset($client) ? $client->comments : '' }}</textarea>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="mt-4 mb-4">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" aria-selected="true">
                            <x-feathericon-tool class="table-icon" style="margin: 0 0 2px 5px"/>
                            Servicios
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" aria-selected="false">
                            <x-feathericon-key class="table-icon" style="margin: 0 0 2px 5px"/>
                            Autos
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home-tab-pane" aria-labelledby="home-tab">
                        <table class="table table-hover" id="table-items">
                            <thead>
                                <th width="300px">Automovil</th>
                                <th>Año</th>
                                <th>Servicio/Fallo</th>
                                <th></th>
                                <th class="text-center">Status</th>
                                <th class="text-end">Fecha servicio</th>
                            </thead>
                            <tbody>
                                @foreach ($client->services as $service)
                                <tr>
                                    <td>
                                        <a href="{{ route('cars.show', $service->car->id) }}">{{ $service->car->brand }} {{ $service->car->model }}</a>
                                    </td>
                                    <td>{{ $service->car->year }}</td>
                                    <td>{{ $service->fault }}</td>
                                    <td>
                                        @if ($service->quote)
                                            <span class="badge text-bg-warning">Cotización</span>
                                        @endif
                                    </td>
                                    <td class="text-center"><span class="badge text-bg-success">{{ $service->status }}</span></td>
                                    <td class="text-end">{{ date ('d-m-Y', strtotime($service->created_at)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="pt-2 ps-3 mb-0">
                            <x-feathericon-clipboard class="table-icon" style="margin-top:-4px;"/>
                            Se encontraron {{ $client->services->count() }} servicios.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" aria-labelledby="profile-tab">
                        <table class="table table-hover" id="table-items">
                            <thead>
                                <th width="300px">Automovil</th>
                                <th>Año</th>
                                <th>VIN <span class="text-muted"> (Vehicle Identification Number)</span></th>
                                <th>Matrícula</th>
                            </thead>
                            <tbody>
                                @foreach ($client->cars as $car)
                                <tr>
                                    <td>
                                        <x-feathericon-arrow-right-circle class="table-icon" style="margin: 0 5px 2px"/>
                                        <a href="{{ route('cars.show', $car->id) }}">{{ $car->brand }} {{ $car->model }}</a>
                                    </td>
                                    <td>{{ $car->year }}</td>
                                    <td>{{ $car->serie }}</td>
                                    <td>{{ $car->plate }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row pt-0 p-4 pb-0">
                <div class="col-md-12 text-end">
                    <a href="{{ route('clients.index') }}" class="btn btn-sm btn-success">Atras</a>
                    <a href="{{ route('finance', $client->id) }}" class="btn btn-sm btn-success">Mas Información</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection