<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia musical</title>
</head>
<body>
<nav>
<a href="home">Home</a>
<a href="eventos">Eventos</a>
<a href="funciones">Funciones</a>
<a href='registrarse'>Registrarse</a>
<a href='miscompras'>Registrarse</a>

{if isset($smarty.session.USER_ID)}
    <a href='miscompras'>Mi carrito</a>
    <a href='logout'>Logout({$smarty.session.USER_EMAIL})</a>

{else}
<a href='login'>Login</a>
{/if}


</nav>

