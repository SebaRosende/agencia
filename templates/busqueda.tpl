{include file='header.tpl'}

<table>
    <tbody>
        <tr>
        <th>Nombre</th>
        <th>Detalles</th>
        <th>Ciudad</th>         
        <th>Fecha</th> 
        <th>Capacidad</th> 
    </tr>
{foreach from=$eventos item=$info}

   
        <tr>
            <td>{$info->nombre}</td>
            <td>{$info->descripcion}</td>
            <td>{$info->ciudad}</td>
            <td>{$info->fecha}</td>
            <td>{$info->capacidad_maxima}</td>
        </tr>



{/foreach}
</tbody>
</table>