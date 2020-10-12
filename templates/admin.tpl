{include file="head.tpl"}
<body>
{include file="header.tpl"}
<div class="container">
        <h2 class="mt-5 ml-5">Nuevo Producto</h2>
        <form class="mt-5 ml-5" action="producto" method="POST">
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip01">Nombre Producto</label>
                    <input name="product_name" type="text" class="form-control" id="validationTooltip01" placeholder="Nombre Producto" value="" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-1 mb-3">
                    <label for="validationTooltip02">Precio</label>
                    <input name="product_price" type="number" class="form-control" id="validationTooltip02" placeholder="Precio" value="" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="validationTooltip03">Categoria</label>
                    <select name="id_categoria" class="form-control" id="exampleFormControlSelect1">
                    {foreach from=$categorias item=item }
                        <option value="{$item->id_categoria}">{$item->nombre_categoria}</option>
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
                    <input name="product_stock"type="number" class="form-control" id="validationTooltip03" placeholder="Stock" value="" required>
                    <div class="invalid-tooltip">
                        Please provide a valid Stock.
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="validationTooltip04">Descripción</label>
                    <input name="product_description" type="text" class="form-control" id="validationTooltip04" placeholder="State" value="" required>
                    <div class="invalid-tooltip">
                        Please provide a valid Descripción.
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Crear</button>
        </form>
</div>
<div class="container">
    <section class="centrado">
        <div class="table-responsive">
            <table class="table table-bordered tabla" id="tablita">
                <thead class="tabla thead">
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>        
                <tbody class="tabla-container">
                    {foreach from=$productos item=item }
                    <tr>
                        <td>{$item->nombre_producto}</td>
                        <td>{$item->precio_producto}</td>
                        <td>{$item->stock_producto}</td>
                        <td>{$item->description_producto}</td> 
                        <td>
                            <div class='actions mb-1'>
                                <a href="producto/{$item->id_producto}" class="button">
                                    <button type="button" class="btn btn-success">Editar</button>
                                </a>
                            </div>
                            <div class='actions mb-1'>
                                <form action="producto/borrar/{$item->id_producto}" method="POST">
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </div>
                        </td>
                    </tr>   
                    {/foreach} 
                </tbody>
            </table>
        </div>
    </section>
</div>
<script src="js/admin.js" crossorigin="anonymous">
</script>
</body>

{include file="footer.tpl"}
