{include file="head.tpl"}
<body>
{include file="header.tpl"}
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 bg-light text-dark rounded mt-5 mb-5">
            {if isset($login)}
                <form action="loguser" method="post" id="login_form">
                    <div class="form-group">
                        <label for="useremail">Direccion de Correo / Email</label>
                        <input name="useremail" type="text" class="form-control" id="useremail" aria-describedby="emailHelp" placeholder="email@mail.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña / Password</label>
                        <input name="password"required type="password" class="form-control" id="exampleInputPassword1" placeholder="Es un secreto">
                    </div>
                    <button type="submit" class="btn btn-primary">Loguear</button>
                    <a href="{BASE_URL}register/">
                        <button class="btn btn-secondary" type="button">Registrar</button>
                    </a>
                </form>
            {else}
                <form action="registeruser" method="post" id="register_form">
                    <div class="form-group">
                        <label for="useremail">Direccion de Correo / Email</label>
                        <input name="useremail" type="text" class="form-control" id="useremail" aria-describedby="emailHelp" placeholder="email@mail.com">
                    </div>
                    <div class="form-group">
                        <label for="username">Nombre de Usuario</label>
                        <input name="username" type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Cosme Fulanito">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña / Password</label>
                        <input name="password"required type="password" class="form-control" id="exampleInputPassword1" placeholder="Es un secreto">
                    </div>
                    <a href="{BASE_URL}login/">
                        <button class="btn btn-primary" type="button">Login</button>
                    </a>
                    <button type="submit" class="btn btn-secondary">Registrarse</button>
                </form>
            {/if}
        </div>
    </div>
</div>
{if isset($errormsg)}
	{$errormsg}
{/if}
</body>
<div class="fixed-bottom">
{include file="footer.tpl"}
<div>
