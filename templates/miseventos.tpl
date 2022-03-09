
<table>
<tbody>
    <tr>
        <th>id_entrada</th>
        <th>Fecha</th>
        <th>Vip</th>
        <th>id_funcion</th>
        <th>id_rol</th>
        <th>id_user</th>
    </tr>
    {foreach from=$eventos item=$info}

        <form method="POST" action="editarEntrada/{$info->id_entrada}">
            <tr>
               
                <td>{$info->id_entrada}</td>
                <td>{$info->fecha_venta}</td>
                <td>{$info->vip}</td>
                <td>{$info->id_funcion}</td>
                <td>{$info->id_rol}</td>
                <td>{$info->id_user}</td>
                <td> <button type="submit">Eliminar</button> </td>  
            </tr>

        </form>

    {/foreach}



</tbody>
</table>