{include file='header.tpl'}



<h2>Login</h2>

<div class="formulario">
<form  method="POST" action="verify">
        <input required="required" type="text" name="email"  placeholder="Ingrese su email...">
        <input required="required" type="password" name="password"  placeholder="Ingrese su password...">
        <button type="submit">Login</button>
    </div>
</form>
</div>



{include file='footer.tpl'}
