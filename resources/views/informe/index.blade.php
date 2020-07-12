<h1>esttoy en la vista de reporte</h1>


@foreach($sucursales as $sucursal)
<table border="1">
<tr>
    <th>{{$sucursal->name}}</th>
</tr>

<tr>
    <th>No Pedido</th>
    <th>Fecha factura</th>
    <th>Cliente</th>
    <th>Dias de Vencimiento</th>
    <th>Saldo</th>
</tr>
@foreach($datos as $data)

<tr>
    <td>{{$data->no_pedido_c}}</td>
    <td>{{$data->invoice_date}}</td>
    <td>{{$data->cedula_c}}</td>
    <td></td>
    <td>{{$data->saldo_c}}</td>
</tr>

@endforeach

<tr>
<td>TOTAL CARTERA</td>
<td></td>
</tr>

</table>
<br>
<hr>
@endforeach 