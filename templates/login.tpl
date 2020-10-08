{include file="head.tpl"}
<body>
{include file="header.tpl"}
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 bg-light text-dark rounded mt-5 mb-5">
            <form action="loguser" method="post">
            <div class="form-group">
                <label for="useremail">Direccion de Correo / Email</label>
                <input name="useremail"type="useremail" class="form-control" id="useremail" aria-describedby="emailHelp" placeholder="email@mail.com">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña / Password</label>
                <input name="password"required type="password" class="form-control" id="exampleInputPassword1" placeholder="Es un secreto">
            </div>
            <button type="submit" class="btn btn-primary">Loguear</button>
            </form>
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
