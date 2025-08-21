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
    <table width="100%">
        <thead style="background-color: #ddd;">
            <td><b>#</b></td>
            <td><b>CONCEPTO</b></td>
            <td><b>FECHA</b></td>
            <td class="text-end"><b>INGRESO</b></td>
            <td class="text-end"><b>EGRESO</b></td>
        </thead>
        <tbody>
            @foreach ($rows as $key => $row)
                <tr style="height: 35px;">
                    <td>{{ $key = $key +1 }}</td>
                    <td><strong>{{ $row->type }}</strong> {{ $row->concept }}</td>
                    <td>{{ Carbon\Carbon::parse($row->date)->format('d-m-Y') }}</td>
                    <td class="text-end">{{ "$".number_format($row->cash_in, 2) }}</td>
                    <td class="text-end">{{ "$".number_format($row->cash_out, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot style="border-top: solid 1px #ddd;">
            <tr style="height: 35px;">
                <td></td>
                <td></td>
                <td></td>
                <td class="text-end">{{ "$".number_format( $rows->sum('cash_in'), 2) }}</td>
                <td class="text-end">{{ "$".number_format( $rows->sum('cash_out'), 2) }}</td>
            </tr>
        </tfoot>
    </table>
    <br>
    <hr>
    <div style="background-color: #efefef; padding: 10px; border:solid 1px #888;">
        <h4 style="margin-top: 0px;">CIERRE BALANCE DE RESULTADOS</h4>
        <table width="100%">
            <tr>
                <td width="33%">
                    <b style="font-size:12px">FECHA:</b>
                </td>
                <td>
                    <b style="font-size:12px">INGRESOS:</b>
                </td>
                <td>
                    <b style="font-size:12px">EGRESOS:</b>
                </td>
                <td>
                    <b style="font-size:12px">SALDO:</b>
                </td>
            </tr>
            <tr>
                <td>
                    {{ Carbon\Carbon::now() }}
                </td>
                <td>
                    {{ "$".number_format($rows->sum('cash_in'), 2) }}
                </td>
                <td>
                    {{ "$".number_format($rows->sum('cash_out'), 2) }}
                </td>
                <td>
                    @php
                        $balance = 0;
                        $balance = $rows->sum('cash_in') - $rows->sum('cash_out');
                    @endphp
                    {{ "$".number_format($balance, 2) }}
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <p style="margin-top: 50px;">
        Para cualquier duda o aclaración quedamos a su entera disposicion, 
        puede comunicarse con nosotros o enviarnos whatsapp al numero: <b>(9994) 48 44 63</b>
    </p>
</body>
</html>