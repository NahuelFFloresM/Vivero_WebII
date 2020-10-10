{include file="head.tpl"}
<body>
{include file="header.tpl"}
{if !isset($edit)}
    <div class="container">
        <section class="centrado">
            <div class="table-responsive">
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline">
                        <input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Ingresar producto..." aria-label="Buscar">
                        <a class="btn btn-primary" href="#" role="button" id="buscarBtn" >
                            Buscar
                        </a>
                    </form>
                </nav>
                <table class="table table-bordered tabla" id="tablita">
                    <thead class="tabla thead">
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Descripción</th>
                        </tr>
                    </thead>        
                    <tbody class="tabla-container">                  
                        <tr>
                            <td>{$producto->nombre_producto}</td>
                            <td>{$producto->precio_producto}</td>
                            <td>{$producto->stock_producto}</td>
                            <td>{$producto->description_producto}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
{else}
    <div class="container">
        <h2 class="mt-5 ml-5">Editar Producto</h2>
        <form class="mt-5 ml-5" action="editProducto/{$producto->id_producto}" method="POST">
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip01">Nombre Producto</label>
                    <input type="text" class="form-control" id="validationTooltip01" placeholder="Nombre Producto" value="{$producto->nombre_producto}" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-1 mb-3">
                    <label for="validationTooltip02">Precio</label>
                    <input type="number" class="form-control" id="validationTooltip02" placeholder="Precio" value="{$producto->precio_producto}" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="validationTooltip03">Categoria</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    {foreach from=$categorias item=item }
                        {if $item->id_categoria == $producto->id_categoria}
                            <option selected>{$item->nombre_categoria}</option>
                        {else}
                            <option>{$item->nombre_categoria}</option>
                        {/if}
                    {/foreach}
                    </select>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                    
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip03">Stock</label>
                    <input type="number" class="form-control" id="validationTooltip03" placeholder="Stock" value="{$producto->stock_producto}" required>
                    <div class="invalid-tooltip">
                        Please provide a valid Stock.
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="validationTooltip04">Descripción</label>
                    <input type="text" class="form-control" id="validationTooltip04" placeholder="State" value="{$producto->description_producto}" required>
                    <div class="invalid-tooltip">
                        Please provide a valid Descripción.
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Guardar</button>
        </form>
    </div>
{/if}
</body>
<div class="fixed-bottom">
{include file="footer.tpl"}
<div>