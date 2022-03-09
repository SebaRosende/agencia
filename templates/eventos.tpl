{include file = 'header.tpl'}

<table>
    <tbody>
        <tr>
            <th>ID</th>
            <th>Eventos</th>
            <th>Detalles</th>
            <th>Ciudad</th>
        </tr>
        {foreach from=$eventos item=$info}

            <form method="POST" action="editarCiudad">
                <tr>
                    <td><input name=id style="width : 50px" value={$info->id_evento} readonly></td>
                    <td>{$info->nombre}</td>
                    <td>{$info->descripcion}</td>
                    <td>{$info->ciudad}</td>
                    {if isset($smarty.session.USER_ID)}
                        <td><input name="ciudad"></td>
                        <td> <button type="submit">EDITAR</button> </td>
                    {/if}
                </tr>

            </form>

        {/foreach}



    </tbody>
</table>
<form method="POST" action="buscar">
<input name=evento value="">
<button type="submit">Buscar eventos</button>
</form>


{if isset($smarty.session.USER_ROL)==1}
    <h2>Para eliminar eventos sin funciones <a href="eliminareventosf">Haga clic aqui</a></h2>
    
{/if}