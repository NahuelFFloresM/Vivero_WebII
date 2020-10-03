<?php
/* Smarty version 3.1.33, created on 2020-10-03 18:28:00
  from 'C:\xampp\htdocs\web2tpe\templates\productos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f78a6903f3898_90844577',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff8a0ca75ee37ea021cd615f7605a8b2cc8ce22f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2tpe\\templates\\productos.tpl',
      1 => 1601726845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f78a6903f3898_90844577 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
                <table class="table table-bordered tabla" id="tablita">
                    <thead class="tabla thead">
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio Minorista</th>
                            <th scope="col">Precio Mayorista</th>
                            <th scope="col">Cantidad Minima p/Mayoristas</th>
                        </tr>
                    </thead>        
                    <tbody class="tabla-container">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>                        
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nombre_producto;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->precio_producto;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->precio_producto;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->stock_producto;?>
</td>
                        </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
