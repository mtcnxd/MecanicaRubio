<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
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
    <div style="display:flex; height:130px;">
        <div style="float:left; width:50%">
            <img src="{{ $image }}" width="220px">
        </div>    
        <div style="float:left; text-align:center;">
            <pre style="font-size: 14px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                INGENIERIA MECANICA RUBIO
                C. 2D 268E, entre 65-G y 65-F
                Col. Francisco Villa Oriente. 
                C.P.: 97370 Mérida, Yuc.
            </pre>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <table width="100%" bordered>
        <thead>
            <td><b>Concepto</b></td>
            <td><b>Fecha</b></td>
            <td class="text-end"><b>Ingresos</b></td>
            <td class="text-end"><b>Egresos</b></td>
        </thead>
        <tbody>
            @foreach ($rows as $row)
            <tr style="height: 35px;">
                <td><strong>{{ $row->type }}</strong> {{ $row->concept }}</td>
                <td>{{ $row->date }}</td>
                <td class="text-end">{{ "$".number_format( (float) $row->cash_in, 2) }}</td>
                <td class="text-end">{{ "$".number_format( (float) $row->cash_out, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 50px;">
        Para cualquier duda o aclaración quedamos a su entera disposicion, 
        puede comunicarse con nosotros o enviarnos whatsapp al numero: <b>(9994) 48 44 63</b>
    </p>
</body>
</html>