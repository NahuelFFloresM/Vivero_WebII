{include file="head.tpl"}
<body>
{include file="header.tpl"}
    <article>
        <h1 class="titleStyle">¿Querés conocer nuestros productos?</h1>
        <div class="centrado">
            <p>En el Mundo de Very Mëy te ofrecemos diferentes productos para que integres la naturaleza a tu
                hogar y a tu vida cotidiana. </p>
            <p> Nuestros productos están inspirados en la naturaleza y pensados para crear espacios felices.</p>
            <p> Terrarios, Kokedamas, Plantitas, Souvenires, Regalos Empresariales, Objetos Reciclados. </p>
            <p> A continuación, te detallamos los productos en stock y los precios y cantidades para compras
                minoristas y/o mayoristas: </p>
        </div>
    </article>
    <div class="card mb-3" style="max-width: 540px d-flex justify-content-center">
        <div class="row no-gutters tarjetaProducto">
            <div class="col-md-4">
                <img src="css/imagenes/Kokedama.png" class="card-img" alt="Planta Kokedama">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Producto Destacado!</h5>
                    <p class="card-text">¿Quieres tener una planta original para decorar tu casa, negocio u oficina?
                        ¿Aún no sabes que regalar para esa ocasión especial? En El Mundo de Very Mëy te traemos este mes
                        una propuesta única
                        perfecta para decorar y regalar. Se trata de las kokedamas, unas plantas que crecen dentro de
                        una bola de musgo y que no necesitan maceta. Se pueden poner sobre la mesa, sobre un trozo de
                        pizarra y piedra o incluso las puedes colgar del techo o de la pared ya que una vez regadas no
                        gotean debido a que el musgo contiene el agua. Aprovecha este mes la super promo de las
                        Kokedamas. Ideales para quedar bien
                        con quien mas queres!!!</p>
                    <p class="card-text"><small class="text-muted">Vigencia de la promo hasta fin de mes!!</small></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form class="p-3 border rounded border-primary" action="buscador" id="form_buscador" method="POST">
            <div class="row">
                <div class="col">
                    <label for="id_categoria">Categoria</label>
                    <select name="id_categoria" name="id_categoria" class="form-control">
                        <option value="-1">Todos</option>
                    {foreach from=$categorias item=item}
                        <option value="{$item->id_categoria}">{$item->nombre_categoria}</option> 
                    {/foreach}
                    </select>
                </div>
                <div class="col">
                    <label for="nombre_producto">Producto</label>
                    <input type="text" class="form-control" name="nombre_producto" id="nombre_producto" placeholder="Producto...">
                </div>
                <div class="col">
                    <label for="precio_producto">Precio</label>
                    <input type="number" class="form-control" name="precio_producto" id="precio_producto" placeholder="Menor a..." min="0">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
        <section class="centrado mt-4">
            <a href="productos" class="button">
                <button type="button" class="btn btn-primary"> Todos </button>
            </a>
            {foreach from=$categorias item=item}
                <a href="productos/categoria/{$item->id_categoria}" class="button">
                    <button type="button" class="btn btn-success"> {$item->nombre_categoria} </button>
                </a>
            {/foreach}
            <div class="table-responsive">
                {if $productos}
                    <table class="table table-bordered tabla" id="tablita">
                        <thead class="tabla thead">
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Mostrar</th>
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
                                    <div class='actions'>
                                        <a href="productos/detalle/{$item->id_producto}" class="button">
                                            <button type="button" class="btn btn-success"> Ver </button>
                                        </a>
                                    </div> 
                                </td>
                            </tr>   
                            {/foreach}
                        </tbody>
                    </table>
                    {if !isset($buscador)}
                    <nav aria-label="..." id="pagination-nav" class="d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="page-item {if isset($pagination) && ($pagination == 1)}disabled{/if}">
                                <a class="page-link" href="productos/pagina/{$pagination-1}">Previous</a>
                            </li>
                            {for $foo=1 to $total_paginas}
                                <li class="page-item {if $pagination == $foo}active{/if}">
                                    <a class="page-link" href="productos/pagina/{$foo}">{$foo}</a>
                                </li>
                            {/for}
                            {if (!$total_paginas)}
                                <li class="page-item active">
                                    <a class="page-link" href="productos/pagina/1">1</a>
                                </li>
                            {/if}
                            <li class="page-item {if isset($pagination) && ($pagination == $total_paginas)}disabled{/if}">
                                <a class="page-link" href="productos/pagina/{$pagination+1}">Next</a>
                            </li>
                        </ul>
                    </nav>
                    {else}
                    <nav aria-label="..." id="pagination-nav" class="d-flex justify-content-center">
                        <ul class="pagination">
                            {* Pagina Previa *}
                            <li class="page-item">
                                <form action="buscador/pagina/{$pagination-1}" id="form_buscador" method="POST">
                                    {if isset($buscarCate)} <input id="id_categoria_buscador" name="id_categoria" type="hidden" value="{$buscarCate}">{/if}
                                    {if isset($buscarName)} <input id="id_nombre_buscador" name="nombre_producto" type="hidden" value="{$buscarName}">{/if}
                                    {if isset($buscarPrecio)} <input id="id_precio_buscador" name="precio_producto" type="hidden" value="{$buscarPrecio}">{/if}
                                    <button type="submit" class="btn " {if isset($pagination) && ($pagination == 1)}disabled{/if}>Previous</button>
                                </form>
                            </li>
                            {* Ciclo de paginas *}
                            {for $foo=1 to $total_paginas}
                            <li class="page-item ">
                                <form action="buscador/pagina/{$foo}" id="form_buscador" method="POST">
                                    {if isset($buscarCate)} <input id="id_categoria_buscador" name="id_categoria" type="hidden" value="{$buscarCate}">{/if}
                                    {if isset($buscarName)} <input id="id_nombre_buscador" name="nombre_producto" type="hidden" value="{$buscarName}">{/if}
                                    {if isset($buscarPrecio)} <input id="id_precio_buscador" name="precio_producto" type="hidden" value="{$buscarPrecio}">{/if}
                                    <button type="submit" class="btn {if $pagination == $foo}button-active{/if}" >{$foo}</button>
                                </form>
                            </li>
                            {/for}
                            {* Pagina Siguiente *}
                            <li class="page-item">
                                <form action="buscador/pagina/{$pagination+1}" id="form_buscador" method="POST">
                                    {if isset($buscarCate)} <input id="id_categoria_buscador" name="id_categoria" type="hidden" value="{$buscarCate}">{/if}
                                    {if isset($buscarName)} <input id="id_nombre_buscador" name="nombre_producto" type="hidden" value="{$buscarName}">{/if}
                                    {if isset($buscarPrecio)} <input id="id_precio_buscador" name="precio_producto" type="hidden" value="{$buscarPrecio}">{/if}
                                    <button type="submit" class="btn" {if isset($pagination) && ($pagination == $total_paginas)}disabled{/if}>Siguiente</button>
                                </form>
                            </li>
                        </ul>
                    </nav>
                    {/if}
                {else}
                    <h2>Actulmente no contamos con stock para este producto</h2>
                {/if}
            </div>
        </section>
    </div>
</body>
{include file="footer.tpl"}