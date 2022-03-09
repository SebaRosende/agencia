{include file='header.tpl'}

<table>
    <tbody>
        <tr>
            <th>Fecha</th>
            <th>Nombre</th>
            <th>Capacidad</th>
            <th>Ciudad</th>         
            <th>ID Función</th> 
            <th>ID Evento</th> 
        </tr>
        {foreach from=$funciones item=$info}

            <form id="form" method="POST" action="comprar" >


                <tr>
                <td><input name=fecha value={$info->fecha} readonly></td>
                    <td>{$info->nombre}</td>                  
                    <td>{$info->capacidad_maxima}</td>
                    <td>{$info->ciudad}</td>  
                    <td><input name=id_funcion style="width : 50px" value={$info->id_funcion} readonly></td>           
                    <td><input name=id_evento style="width : 50px" value={$info->id_evento} readonly></td>
                    {if isset($smarty.session.USER_ID)}     
                    <td> <button type="submit">Comprar</button> </td>
                    <td><label>Cantidad</label>            
                    <select name="cant_entradas">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select></td>
                    <td><label>VIP</label>            
                    <select name="vip">
                        <option value="1">Yes</option>
                        <option value="2">No</option>                        
                    </select></td>
                {/if}
                </tr>

            </form>

        {/foreach}

      

    </tbody>
</table>


{if isset($smarty.session.USER_ROL)}
    {if ($smarty.session.USER_ROL)==1}
    <h2>Para eliminar funciones sin entradas<a href="eliminarfunciones">Haga clic aqui</a></h2>
{/if}
{/if}
