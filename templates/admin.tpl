{include file="head.tpl"}
<body>
{include file="header.tpl"}
<h1>Admin Section</h1>
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
                                    <form action="producto/{$item->id_producto}" method="DELETE">
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    <form>
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
