<!DOCTYPE html>
<html>
<head>
    <title>Mi PDF</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 13px; }
        h1 { color: #4CAF50; }
        tr { height: 35px }
        .row { display: flex; }
        .col { width: 20%; }
        .text-end { text-align: right; }
    </style>
</head>
<body>
    <img src="/images/mainlogo.png">

    <div class="row" style="background-color: #efefef; padding: 5px">
        <h4>Datos del vehiculo</h4>
        <table width="100%">
            <tr>
                <td width="75%"><b>Cliente:</b> {{ $client->name }}</td>
                <td><b>Fecha:</b>{{ Carbon\Carbon::now()->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td width="75%"><b>Automovil:</b> {{ $auto->brand }} {{ $auto->model }} {{ $auto->year }}</td>
                <td><b>Servicio: </b>{{ $service->id }}</td>
            </tr>
        </table>
    </div>

    <div class="row">
        <h4>Servicio/Fallo reportado:</h4> 
        {{ $service->fault }}
    </div>
    
    <p>
        A continuación se detalla la lista de materiales y mano de obra del servicio requerido:
    </p>

    <hr>
    <table width="100%">
        <thead>
            <td>Cant</td>
            <td>Descripción</td>
            <td class="text-end">P.Unitario</td>
            <td class="text-end">Importe</td>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($items as $item)
            @php
                $total += $item->amount * $item->price;
            @endphp
            <tr style="height: 35px;">
                <td>{{ $item->amount }}</td>
                <td>{{ $item->item }}</td>
                <td class="text-end">{{ "$".number_format($item->price, 2) }}</td>
                <td class="text-end">{{ "$".number_format($item->amount * $item->price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <table style="margin-top: 20px;" width="100%">
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="text-end">{{ "$".number_format($total, 2) }}</td>
        </tr>
    </table>

    <p style="margin-top: 50px;">
        Para cualquier duda o aclaración quedamos a su entera disposicion, 
        puede comunicarse con nosotros o enviarnos whatsapp al numero: <b>(9994) 48 44 63</b>
    </p>
</body>
</html>