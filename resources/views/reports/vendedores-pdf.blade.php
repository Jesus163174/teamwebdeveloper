<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Reporte de creditos</title>
        <link rel="stylesheet" href="style.css" media="all" />
    </head>
    <body>
        <header class="clearfix">
            <h1>Vendedor: {{$vendedor->name}}</h1>
            <div id="project">
                <div><span>Reporte: </span> Creditos por vendedor</div>
                <div><span>Fecha: </span> {{now()->format('Y-m-d')}}</div>
                <div><span>N° de creditos: </span> {{count($creditos)}}</div>
                <div><span>Dinero de cobros: </span> ${{number_format($dineroPagado,2,'.',',')}}</div>
                <div><span>Dinero Prestado: </span> ${{number_format($sumaDineroPrestado,2,'.',',')}}</div>
            </div>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th  class="">Cliente</th>
                        <th    class="">Fecha</th>
                        <th  >Pago</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagos as $pago)
                    <tr>
                        <td class="">{{$pago->customer->fullname}}</td>
                        <td class="">{{$pago->created_at}}</td>
                        <td class="">${{number_format($pago->payment,2,'.',',')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </main>
        
    </body>
</html>

