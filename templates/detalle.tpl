{include file="head.tpl"}
<body>
{include file="header.tpl"}

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
</body>
{include file="footer.tpl"}