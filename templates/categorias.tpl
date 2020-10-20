{include file="head.tpl"}
<body>
{include file="header.tpl"}
<div class="container">
    <h2 class="mt-5 ml-5">Editar Categoria</h2>
    <form class="mt-5 ml-5" action="editCategoria/{$categoria->id_categoria}" method="POST">
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="validationTooltip01">Nombre Categoria</label>
                <input name="nombre_categoria" type="text" class="form-control" id="validationTooltip01" placeholder="Nombre Categoria" value="{$categoria->nombre_categoria}" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationTooltip02">Descripción</label>
                <input name="descripcion_categoria" type="text" class="form-control" id="validationTooltip02" placeholder="Descripcion" value="{$categoria->descripcion_categoria}" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
            </div>
        </div>
        <button class="btn btn-success" type="submit">Guardar</button>
        <a href="{BASE_URL}admin/">
            <button class="btn btn-secondary" type="button">Cancelar</button>
        </a>
    </form>
</div>
</body>
<div class="fixed-bottom">
{include file="footer.tpl"}
<div>