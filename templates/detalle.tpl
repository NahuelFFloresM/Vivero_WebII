{include file="head.tpl"}
<body>
{include file="header.tpl"}
 
    {if !isset($edit)}
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
                                <th scope="col">Imagen</th>
                            </tr>   
                        </thead>
                        <tbody class="tabla-container">
                            <tr>
                                <td>{$producto->nombre_producto}</td>
                                <td>{$producto->precio_producto}</td>
                                <td>{$producto->stock_producto}</td>
                                <td>{$producto->description_producto}</td>
                                <td>
                                    {if ($producto->imagen_url) }
                                        <img src="./{$producto->imagen_url}" alt="imagen_producto">
                                    {else}
                                        <img src="./images/default.jpg" alt="imagen_producto">
                                    {/if}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                        <input name="id_producto" type="hidden" class="form-control" id="id_producto" value="{$producto->id_producto}">
                            {if isset($logged)}
                            <form method="POST" action="#" class="text-center" id="comentario_form">
                                <!-- id_producto -->
                                <h2>Comentarios y Puntuación del Producto</h2>
                                    <!-- Comentario -->
                                    <div class="form-group"> 
                                        <label for="comentario">Dejá aquí tu Comentario:</label>
                                        <textarea class="form-control" rows="5" name="commentText" id="commentText" placeholder="Comentario..."></textarea>
                                    </div>

                                    <!-- Puntuación para el Producto -->
                                    <h3>Puntuación del Producto</h2>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value=1>
                                        <label class="form-check-label" for="inlineRadio1">1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value=2>
                                        <label class="form-check-label" for="inlineRadio2">2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value=3>
                                        <label class="form-check-label" for="inlineRadio3">3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value=4>
                                        <label class="form-check-label" for="inlineRadio4">4</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value=5>
                                        <label class="form-check-label" for="inlineRadio5">5</label>
                                    </div>
                                    <button type="submit" id="submitComment" class="btn btn-primary">Enviar Comentario</button>
                            </form>
                            {/if}
                    
                            <a href="{BASE_URL}productos/">
                                <button class="btn btn-info" type="button">Volver</button>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <h2>Comentarios de este Producto</h2>
                            <section id="container_comentarios">
                                <ul>
                                
                                </ul>
                            </section>
                        </div>
                    </div>
                </div> 
            </section>
        </div>   
    {else}
        <div class="container">
            <div class="row">
                <div class="col-md-12 offset-md-2 m-2 p-2 border border-secondary">
                    <h2 class="mt-5 ml-5">Editar Producto</h2>
                    <form class="mt-5 ml-5" action="editProducto/{$producto->id_producto}" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationTooltip01">Nombre Producto</label>
                                <input name="product_name" type="text" class="form-control" id="validationTooltip01" placeholder="Nombre Producto" value="{$producto->nombre_producto}" required>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-1 mb-3">
                                <label for="validationTooltip02">Precio</label>
                                <input name="product_price" type="number" class="form-control" id="validationTooltip02" placeholder="Precio" value="{$producto->precio_producto}" required>
                                <div class="valid-tooltip">
                                Looks good!
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="validationTooltip03">Categoria</label>
                                <select name="id_categoria" class="form-control" id="exampleFormControlSelect1">
                                {foreach from=$categorias item=item }
                                    {if $item->id_categoria == $producto->id_categoria}
                                        <option selected value="{$item->id_categoria}">{$item->nombre_categoria}</option>
                                    {else}
                                        <option value="{$item->id_categoria}">{$item->nombre_categoria}</option>
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
                                <input name="product_stock"type="number" class="form-control" id="validationTooltip03" placeholder="Stock" value="{$producto->stock_producto}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid Stock.
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="validationTooltip04">Descripción</label>
                                <input name="product_description" type="text" class="form-control" id="validationTooltip04" placeholder="State" value="{$producto->description_producto}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid Descripción.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3 img_container">
                                {if ($producto->imagen_url) }
                                    <img src="./{$producto->imagen_url}" alt="imagen_producto">
                                {else}
                                    <img src="./images/default.jpg" alt="imagen_producto">
                                {/if}
                                <input type="file" name="image_url" id="imageToUpload" accept="image/png, image/jpeg">
                            </div>
                        </div>
                        <div class="form-check m-3">
                            <input type="checkbox" class="form-check-input" id="setBorradoImagen" name="setBorradoImagen">
                            <label class="form-check-label" for="exampleCheck1">Borrar Imagen</label>
                        </div>
                        <button class="btn btn-success" type="submit">Guardar</button>
                        <a href="{BASE_URL}admin/">
                            <button class="btn btn-secondary" type="button">Cancelar</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    {/if}

        <!-- incluyo JS -->
        <script src="js/comentario.js"></script>
</body>
{include file="footer.tpl"}
