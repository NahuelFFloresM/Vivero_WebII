{include file="head.tpl"}
<body>
{include file="header.tpl"}
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 bg-light text-dark rounded mt-5 mb-5">
            <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Direccion de Correo / Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@mail.com">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña / Password</label>
                <input required type="password" class="form-control" id="exampleInputPassword1" placeholder="Es un secreto">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
<div class="fixed-bottom">
{include file="footer.tpl"}
<div>
