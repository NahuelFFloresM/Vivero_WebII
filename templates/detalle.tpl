{include file="head.tpl"}
<body>
{include file="header.tpl"}

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
                <a href="{BASE_URL}productos/">Volver</a>
            </div>
        </section>
    </div>
</body>
{include file="footer.tpl"}