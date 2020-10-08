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
        <section class="centrado">
            <div class="table-responsive">
                <nav class="navbar navbar-light bg-light">
                   {* <form class="form-inline">
                        <input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Ingresar producto..." aria-label="Buscar">
                        <a class="btn btn-primary" href="#" role="button" id="buscarBtn" >
                            Buscar
                        </a>
                    </form>*}
                </nav>
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
                            <td> <div class='actions'>
                                <button type="button" class="btn btn-secondary" href="ver/{$producto->id}">Ver</button>
                            </div> </td>              
                        </tr>   
                        {/foreach} 
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>
{include file="footer.tpl"}