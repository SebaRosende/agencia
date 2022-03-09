{include file='header.tpl'}

<table>
<tbody>
    <tr>
        <th>ID Entrada</th>
        <th>Fecha</th>
        <th>Vip</th>
        <th>ID Función</th>
        <th>ID Rol</th>
        <th>ID User</th>
    </tr>
    {foreach from=$entradas item=$info}

        <form method="POST" action="eliminarEntrada/{$info->id_entrada}">
            <tr>
               
                <td>{$info->id_entrada}</td>
                <td>{$info->fecha_venta}</td>
                <td>{$info->vip}</td>
                <td>{$info->id_funcion_fk}</td>
                <td>{$info->id_rol}</td>
                <td>{$info->id_user}</td>
                <td> <button type="submit">Eliminar</button> </td>  
            </tr>

        </form>

    {/foreach}



</tbody>
</table>


{include file='footer.tpl'}
