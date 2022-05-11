<table>
    <thead>
    <tr>
        <th>Numero de ordenes totales</th>
        <th>Ordenes aprobadas</th>
        <th>Ordenes pendientes</th>
        <th>Ordenes canceladas</th>
        <th>% ordenes efectivas</th>
        <th>valor promedio de las ordenes</th>
        <th>valor total de las ordenes</th>
        <th>valor total ordenes exitosas</th>
        <th>% ingreso efectivo</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $data[0] }}</td>
            <td>{{ $data[1] }}</td>
            <td>{{ $data[2] }}</td>
            <td>{{ $data[3] }}</td>
            <td>{{ $data[4] }}</td>
            <td>{{ $data[5] }}</td>
            <td>{{ $data[6] }}</td>
            <td>{{ $data[7] }}</td>
            <td>{{ $data[8] }}</td>
        </tr>
    </tbody>
</table>