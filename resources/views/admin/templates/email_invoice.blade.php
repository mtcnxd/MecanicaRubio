<style>
    body {
        background-color: #fafafa;
        font-family: Arial, Helvetica, sans-serif;
    }
    .header {
        width: 100%;
        height: 120px;
        background-color: #000;
        display: flex;
        color: #fff
    }
    .footer {
        width: 100%;
        background-color: #000;
        font-size: 11px;
        text-align: center;
        color: #fff;
        padding: 30px 0;
    }
    img {
        padding-left: 20px;
        max-height: 110px;
        width: auto;
    }
    .greeting {
        background-color: #f0cf7d;
        height: 10px;
        padding: 20px;
        font-size: 14px;
    }
    table {
        width: 100%;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    tr {
        height: 30px;
    }
    .total, .price {
        font-size: 22px;
        font-weight: bold;
    }
    .price {
        color: #56bf76;
    }
    .text-end {
        text-align: end;
    }
    .main {
        width: 95%;
        margin: 0 auto;
    }
    .row {
        width: 100%;
        display: flex;
        justify-content: space-between;
    }
    .page {
        padding-top: 0px;
        padding: 25px;
    }
    .pb {
        padding-bottom: 20px;
    }
</style>

<body>
    <div class="main">
        <div class="header">
            <img src="https://scontent.fmid3-1.fna.fbcdn.net/v/t39.30808-6/422162603_3653566461627766_1554580159527816843_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=5f2048&_nc_ohc=zbFShwSDIzwAb7yKQiy&_nc_ht=scontent.fmid3-1.fna&oh=00_AfAhoiSFDJkqqt0rvqUETD1exhuTJ21Jx3SHbIOrUVhbnw&oe=662732D7" />
        </div>
        <div class="greeting text-end">
            Enviado: {{ \Carbon\Carbon::now()->format('h:i a d-m-Y') }}
        </div>
        <div class="page">
            <h2>Hola {{ $service->client->name }}</h2>
            <p>A continuación encontrará el desglose de las refacciones utilizadas, asi como el costo por nuestro servicio.</p>
            <table>
                @foreach ($service->holamundo as $item)
                    
                @endforeach
            </table>

            <div class="row pb">
                <div class="col">
                    <span class="total">Total</span>
                </div>
                <div class="col">
                    <span class="price">{{ "$".number_format($total, 2) }}</span>
                </div>
            </div>

            <p>Para cualquier duda o aclaracion, puede comunicarse con nosotros al teléfono/whatsapp: 9994-48-44-63</p>
        </div>
        <div class="footer">
            <p>Ing. Mecanica Rubio: C.2D Col. Francisco Villa Ote.</p>
        </div>
    </div>
</body>